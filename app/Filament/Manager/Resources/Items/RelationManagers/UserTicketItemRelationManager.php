<?php

namespace App\Filament\Manager\Resources\Items\RelationManagers;

use App\Models\UserTicketItem;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class UserTicketItemRelationManager extends RelationManager
{
    protected static string $relationship = 'userTicketItem';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                IconColumn::make('userTicket.was_ai_correct')
                    ->label(__('Was AI correct?'))
                    ->boolean(),
                TextColumn::make('userTicket.label')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                Action::make('view_ai_correctness')
                    ->label(__('View AI Correctness'))
                    ->modalHeading(__('AI Correctness and IT Specialist Comment'))
                    ->modalContent(function (UserTicketItem $record) {
                        $wasAiCorrect = $record->userTicket->was_ai_correct;
                        $aiCorrectnessHtml = $wasAiCorrect ? '<span style="color: green; font-weight: bold;">&#10004; Yes</span>' : '<span style="color: red; font-weight: bold;">&#10008; No</span>';
                        $itSpecialistComment = $record->userTicket->it_specialist_comment;
                        $aiRecommendationText = $record->userTicket->ai_recommendation;

                        return view('filament.manager.resources.items.relation-managers.user-ticket-item-relation-manager.modals.ai-correctness', [
                            'aiCorrectnessHtml' => new HtmlString($aiCorrectnessHtml),
                            'itSpecialistComment' => new HtmlString($itSpecialistComment),
                            'aiRecommendationText' => new HtmlString($aiRecommendationText),
                        ]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel(__('Close')),
                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
