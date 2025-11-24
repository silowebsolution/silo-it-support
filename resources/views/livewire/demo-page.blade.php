<div class="relative min-h-screen overflow-hidden bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0">
        <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-gradient-to-r from-cyan-400/40 via-sky-500/30 to-indigo-500/30 blur-3xl"></div>
        <div class="absolute right-0 top-32 h-96 w-96 rounded-full bg-gradient-to-r from-purple-500/30 via-rose-400/20 to-transparent blur-3xl"></div>
    </div>

    <div class="relative z-10 mx-auto max-w-6xl px-4 pb-24 pt-10 sm:px-6 lg:px-8">
        <header class="flex flex-wrap items-center justify-between gap-6 rounded-3xl border border-white/30 bg-white/60 px-6 py-4 shadow-lg backdrop-blur dark:border-white/10 dark:bg-white/5">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 via-sky-500 to-cyan-400 text-white shadow-inner">
                    IT
                </div>
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-slate-500 dark:text-slate-400">Platform</p>
                    <p class="text-xl font-semibold text-slate-900 dark:text-white">IT SUPPORT</p>
                </div>
            </div>
            <nav class="hidden flex-1 items-center justify-center gap-6 text-sm font-medium text-slate-600 dark:text-slate-300 lg:flex">
                <a href="#features" class="transition hover:text-slate-900 dark:hover:text-white">Features</a>
                <a href="#ai" class="transition hover:text-slate-900 dark:hover:text-white">AI Engine</a>
                <a href="#roles" class="transition hover:text-slate-900 dark:hover:text-white">Roles</a>

                <a href="#mobile" class="transition hover:text-slate-900 dark:hover:text-white">Mobile App</a>
            </nav>
            <div class="flex flex-1 flex-wrap items-center justify-end gap-3 text-sm font-semibold lg:flex-none">
                <a href="{{ route('login') }}"
                   class="rounded-2xl border border-slate-200/80 px-4 py-2 transition hover:border-slate-400 hover:bg-white dark:border-white/20 dark:bg-white/5 dark:hover:border-white/40">
                    Login
                </a>
                <a href="{{ route('filament.manager.pages.dashboard') }}"
                   class="rounded-2xl bg-gradient-to-r from-indigo-500 via-sky-500 to-cyan-400 px-5 py-2 text-white shadow-lg shadow-indigo-500/30 transition hover:scale-[1.01]">
                    Manager Login
                </a>
            </div>
        </header>

        <main class="mt-16 space-y-32">
            <section id="hero" class="grid gap-12 lg:grid-cols-12 lg:items-center">
                <div class="space-y-8 lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/60 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-slate-600 shadow-lg shadow-slate-900/5 dark:bg-white/10 dark:text-white">
                        Centralized IT intelligence
                        <span class="inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">Platform Summary</p>
                        <h1 class="mt-4 text-4xl font-semibold leading-tight text-slate-900 dark:text-white sm:text-5xl">
                            Intelligent IT Request Management System
                        </h1>
                        <p class="mt-6 text-lg text-slate-600 dark:text-slate-300">
                            A centralized IT request &amp; task-management workspace where AI assists classification,
                            balances specialist workloads, and keeps managers, IT staff, and employees aligned. Deliver faster communication,
                            transparent operations, and actionable reporting from a single pane of glass.
                        </p>
                    </div>
                    <div class="grid gap-6">
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('login') }}"
                               class="rounded-2xl bg-gradient-to-r from-sky-500 via-cyan-400 to-teal-400 px-6 py-3 text-base font-semibold text-white shadow-lg shadow-cyan-500/40 transition hover:brightness-110">
                                Try as User
                            </a>
                            <a href="{{ route('filament.manager.pages.dashboard') }}"
                               class="rounded-2xl border border-slate-200/80 px-6 py-3 text-base font-semibold text-slate-900 transition hover:border-slate-400 hover:bg-white dark:border-white/20 dark:bg-white/5 dark:text-white dark:hover:border-white/40">
                                Login as Manager
                            </a>

                        </div>
                        <div class="flex flex-wrap gap-12 text-sm">
                            <div>
                                <p class="text-3xl font-semibold text-slate-900 dark:text-white">65%</p>
                                <p class="text-slate-500 dark:text-slate-400">Faster ticket routing</p>
                            </div>
                            <div>
                                <p class="text-3xl font-semibold text-slate-900 dark:text-white">4 Roles</p>
                                <p class="text-slate-500 dark:text-slate-400">User · Specialist · Manager · Admin</p>
                            </div>
                            <div>
                                <p class="text-3xl font-semibold text-slate-900 dark:text-white">24/7</p>
                                <p class="text-slate-500 dark:text-slate-400">Monitoring &amp; reporting</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative lg:col-span-5">
                    <div class="rounded-[32px] border border-white/60 bg-white/90 shadow-2xl shadow-indigo-500/20 backdrop-blur dark:border-white/10 dark:bg-white/5">
                        <div class="border-b border-slate-200/70 px-6 py-4 dark:border-white/10">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500 dark:text-slate-300">Live Operations</p>
                                    <p class="text-2xl font-semibold text-slate-900 dark:text-white">Smart workload board</p>
                                </div>
                                <div class="flex items-center gap-2 rounded-2xl border border-slate-200/70 bg-white px-3 py-1 text-xs font-semibold text-slate-600 dark:border-white/20 dark:bg-white/10 dark:text-white">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                    Auto routing
                                </div>
                            </div>
                        </div>
                        <div class="px-6 py-5">
                            <div class="mb-3 flex items-center justify-between text-xs font-semibold text-slate-500 dark:text-slate-300">
                                <span>Tickets overview</span>
                                <div class="flex items-center gap-2 rounded-xl border border-slate-200/70 bg-white px-3 py-1 dark:border-white/10 dark:bg-white/5">
                                    <span>Status</span>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="overflow-hidden rounded-2xl border border-slate-200/80 text-sm shadow-inner dark:border-white/10">
                                <div class="grid grid-cols-[1.4fr_0.9fr_1fr_0.7fr] bg-slate-50/60 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-slate-500 dark:bg-white/5 dark:text-slate-300">
                                    <span>Request</span>
                                    <span>Topic</span>
                                    <span>Assignee</span>
                                    <span class="text-right">SLA</span>
                                </div>
                                @foreach([
                                    ['request' => 'VPN access failure', 'topic' => 'Security', 'assignee' => 'Evelyn Chen', 'sla' => '02:15', 'badge' => 'Auto-assign', 'color' => 'text-sky-500'],
                                    ['request' => 'New device onboarding', 'topic' => 'Inventory', 'assignee' => 'Lukas Meyer', 'sla' => '04:48', 'badge' => 'Queued', 'color' => 'text-amber-500'],
                                    ['request' => 'Printer offline', 'topic' => 'Facilities', 'assignee' => 'Team North', 'sla' => 'Met', 'badge' => 'Resolved', 'color' => 'text-emerald-500'],
                                ] as $row)
                                    <div class="grid grid-cols-[1.4fr_0.9fr_1fr_0.7fr] items-center border-t border-slate-200/70 bg-white/80 px-4 py-3 text-slate-700 dark:border-white/10 dark:bg-white/5 dark:text-slate-200">
                                        <div>
                                            <p class="font-semibold text-slate-900 dark:text-white">{{ $row['request'] }}</p>
                                            <p class="text-xs text-slate-500 dark:text-slate-400">{{ $row['badge'] }}</p>
                                        </div>
                                        <span>{{ $row['topic'] }}</span>
                                        <div class="inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white px-3 py-1 text-xs font-medium text-slate-600 dark:border-white/20 dark:bg-white/10 dark:text-slate-200">
                                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                                            {{ $row['assignee'] }}
                                        </div>
                                        <span class="text-right font-semibold {{ $row['sla'] === 'Met' ? 'text-emerald-500' : 'text-slate-900 dark:text-white' }}">{{ $row['sla'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -left-8 hidden w-40 rounded-2xl border border-white/30 bg-white/70 p-4 text-xs shadow-xl shadow-slate-900/10 backdrop-blur dark:border-white/10 dark:bg-white/10 lg:block">
                        <p class="text-slate-500 dark:text-slate-300">AI highlights</p>
                        <p class="mt-1 font-semibold text-slate-900 dark:text-white">Automatic classification completed for 98% of tickets.</p>
                    </div>
                </div>
            </section>

            <section id="ai" class="rounded-[32px] border border-white/40 bg-white/70 p-10 shadow-2xl shadow-slate-900/5 backdrop-blur dark:border-white/10 dark:bg-white/5">
                <div class="grid gap-10 lg:grid-cols-2">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">AI Engine</p>
                        <h2 class="mt-4 text-3xl font-semibold text-slate-900 dark:text-white">NLP-powered routing &amp; continuous learning</h2>
                        <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">
                            AI models classify every request, predict the right specialist, and surface historical device data.
                            Managers gain transparency with explainable scores and anomaly detection.
                        </p>
                    </div>
                    <div class="grid gap-6 sm:grid-cols-2">
                        @foreach([
                            ['title' => 'Contextual tagging', 'copy' => 'NLP reads free-form requests and assigns topics, urgency, and SLA automatically.'],
                            ['title' => 'Load-balanced queues', 'copy' => 'Dynamic queues watch specialist capacity and shift work to open bandwidth.'],
                            ['title' => 'Smart replies', 'copy' => 'Suggested responses keep communication fast while honoring policy.'],
                            ['title' => 'Signal monitoring', 'copy' => 'Usage insights, inventory anomalies, and KPI drift fire proactive alerts.'],
                        ] as $card)
                            <div class="rounded-2xl border border-slate-200/80 bg-white/80 p-5 shadow-lg shadow-slate-900/5 dark:border-white/10 dark:bg-white/5">
                                <p class="text-sm font-semibold text-slate-500 dark:text-slate-300">{{ $card['title'] }}</p>
                                <p class="mt-2 text-sm text-slate-700 dark:text-slate-200">{{ $card['copy'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="roles" class="space-y-10">
                <div class="flex flex-wrap items-center justify-between gap-6">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">Access Control</p>
                        <h2 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Purpose-built views for every role</h2>
                        <p class="mt-4 max-w-2xl text-lg text-slate-600 dark:text-slate-300">
                            Role-aware dashboards keep basic users focused on submissions, IT specialists on execution, managers on analytics,
                            and admins on governance.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 rounded-full border border-slate-200/60 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-600 shadow dark:border-white/10 dark:bg-white/5 dark:text-white">
                        Multi-factor authentication
                        <span class="text-emerald-500">Email · Google OAuth</span>
                    </div>
                </div>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @foreach([
                        ['label' => 'Basic User', 'desc' => 'Submit and track requests from any device with guided forms.'],
                        ['label' => 'Specialist', 'desc' => 'Kanban queues, device context, and chat built for rapid response.'],
                        ['label' => 'Manager', 'desc' => 'Dashboards, SLA monitoring, workload heatmaps, and trend reporting.'],
                        ['label' => 'Admin', 'desc' => 'Access policies, inventory catalogs, audit logs, and integrations.'],
                    ] as $role)
                        <div class="rounded-3xl border border-white/50 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur dark:border-white/10 dark:bg-white/5">
                            <p class="text-sm font-semibold uppercase tracking-wide text-slate-500 dark:text-slate-300">{{ $role['label'] }}</p>
                            <p class="mt-3 text-base text-slate-700 dark:text-slate-200">{{ $role['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="demo" class="space-y-10">
                <div class="flex flex-col gap-3 text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">Try / Login</p>
                    <h2 class="text-3xl font-semibold text-slate-900 dark:text-white">Choose how you want to explore the platform</h2>
                    <p class="text-base text-slate-600 dark:text-slate-300">Separate entry points for fast user submissions and deep managerial analytics.</p>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="relative overflow-hidden rounded-[28px] border border-white/60 bg-white/90 p-8 shadow-xl shadow-sky-500/10 backdrop-blur dark:border-white/10 dark:bg-white/5">
                        <div class="flex items-center gap-3 text-slate-500 dark:text-slate-300">
                            <svg class="h-10 w-10 rounded-2xl bg-sky-500/10 p-2 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5 12.083 12.083 0 015.84 10.578L12 14z" />
                            </svg>
                            <span class="text-sm font-semibold uppercase tracking-wide">Basic User Login</span>
                        </div>
                        <p class="mt-4 text-lg text-slate-700 dark:text-slate-200">Submit requests in seconds, chat with IT, and track live status with proactive notifications.</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600 dark:text-slate-300">
                            <li>• Simple access for fast request submission</li>
                            <li>• Real-time tracking and status alerts</li>
                            <li>• Built for non-technical employees</li>
                        </ul>
                        <a href="{{ route('login') }}" class="mt-6 inline-flex items-center justify-center rounded-2xl bg-sky-500/90 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/40 transition hover:bg-sky-500">
                            Enter as User
                        </a>
                    </div>

                    <div class="relative overflow-hidden rounded-[28px] border border-white/60 bg-slate-900/90 p-8 text-white shadow-2xl shadow-indigo-900/40 backdrop-blur dark:border-white/10">
                        <div class="flex items-center gap-3 text-indigo-200">
                            <svg class="h-10 w-10 rounded-2xl bg-indigo-500/20 p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2a2 2 0 00-2-2H5v-2a2 2 0 012-2h2V7a2 2 0 012-2h2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h6m0 0v6m0-6l-7 7" />
                            </svg>
                            <span class="text-sm font-semibold uppercase tracking-wide">Manager / IT Staff Login</span>
                        </div>
                        <p class="mt-4 text-lg text-indigo-50">Access dashboards, analytics, and specialist management tools built for enterprise IT leaders.</p>
                        <ul class="mt-4 space-y-2 text-sm text-indigo-100/80">
                            <li>• Control center for dispatching &amp; workloads</li>
                            <li>• Deep reporting &amp; SLA monitoring</li>
                            <li>• Advanced controls and governance</li>
                        </ul>
                        <a href="{{ route('filament.manager.pages.dashboard') }}" class="mt-6 inline-flex items-center justify-center rounded-2xl bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                            Enter as Manager
                        </a>
                    </div>
                </div>
            </section>

            <section id="features" class="space-y-10">
                <div class="flex flex-col gap-3 text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">Key Features</p>
                    <h2 class="text-3xl font-semibold text-slate-900 dark:text-white">Everything modern IT teams need to stay ahead</h2>
                    <p class="text-base text-slate-600 dark:text-slate-300">From AI-powered classification to real-time collaboration and comprehensive security.</p>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach([
                        ['title' => 'AI-powered request classification (NLP)', 'desc' => 'Machine intelligence reads every request, tags root causes, and accelerates triage.'],
                        ['title' => 'Automatic specialist assignment', 'desc' => 'Match requests to the right experts based on skill, availability, and live workload.'],
                        ['title' => 'Multi-role access', 'desc' => 'User, Specialist, Manager, and Admin experiences with granular permissions.'],
                        ['title' => 'Real-time communication & WebSocket chat', 'desc' => 'Instant messaging keeps end-users and IT synced, with delivery confirmation.'],
                        ['title' => 'Inventory & device history tracking', 'desc' => 'Tie every ticket to asset lineage, repairs, and lifecycle milestones.'],
                        ['title' => 'Reporting & analytics module', 'desc' => 'Visualize SLA compliance, productivity, and sentiment trends for leadership.'],
                        ['title' => 'Multi-factor authentication', 'desc' => 'Secure access via email verification and Google OAuth options.'],
                        ['title' => 'Monitoring & transparency', 'desc' => 'Manager dashboards reveal throughput, bottlenecks, and automation savings.'],
                    ] as $feature)
                        <div class="flex gap-4 rounded-3xl border border-white/60 bg-white/80 p-6 shadow-lg shadow-slate-900/5 backdrop-blur dark:border-white/10 dark:bg-white/5">
                            <div class="mt-1 flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500/20 to-cyan-400/20 text-slate-900 dark:text-white">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                    <circle cx="12" cy="12" r="9" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $feature['title'] }}</p>
                                <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section id="mobile" class="grid gap-10 lg:grid-cols-12 lg:items-center">
                <div class="space-y-6 lg:col-span-5">
                    <p class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-500">Mobile App</p>
                    <h2 class="text-3xl font-semibold text-slate-900 dark:text-white">Submit requests and get all info in your phone</h2>
                    <p class="text-base text-slate-600 dark:text-slate-300">
                        Field teams and remote employees capture issues on the go, scan and get all information about items in real-time.
                    </p>
                    <div class="rounded-3xl border border-white/50 bg-white/90 p-6 shadow-lg shadow-slate-900/5 backdrop-blur dark:border-white/10 dark:bg-white/5">
                        <p class="text-sm font-semibold text-slate-500 dark:text-slate-300">Download &amp; QR</p>
                        <div class="mt-4 flex flex-col gap-6 lg:flex-row">
                            <div class="flex flex-col items-center gap-3">
                                @if($qrCode)
                                    <img src="{{ $qrCode }}" alt="Download QR code" class="h-40 w-40 rounded-[28px] border border-slate-200/60 bg-white p-3 shadow-inner dark:border-white/10 dark:bg-white/5">
                                @else
                                    <div class="flex h-40 w-40 items-center justify-center rounded-[28px] border border-dashed border-slate-300 text-xs text-slate-500 dark:border-white/20 dark:text-slate-300">
                                        QR temporarily unavailable
                                    </div>
                                @endif
                                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500 dark:text-slate-300">Scan to install</p>
                            </div>
                            <div class="flex flex-1 flex-col justify-center space-y-4 text-sm text-slate-600 dark:text-slate-300">
                                <div>
                                    <p class="font-semibold text-slate-900 dark:text-white">Frictionless deployment</p>
                                    <p>Share the QR in onboarding packets or print it for office kiosks. Links stay synced with the latest build.</p>
                                </div>
                                <a href="{{ url('/download-app') }}" class="inline-flex w-fit items-center gap-3 rounded-2xl bg-slate-900 px-6 py-3 text-base font-semibold text-white shadow-lg shadow-slate-900/30 transition hover:scale-[1.01] dark:bg-white/10">
                                    <span class="text-xl">⬇</span>
                                    Download app
                                </a>
                                @unless($isDemoAvailable)
                                    <p class="text-xs font-semibold text-amber-500">Demo build temporarily offline.</p>
                                @endunless
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <div class="relative mx-auto flex h-[600px] w-[320px] items-center justify-center rounded-[46px] border-[10px] border-slate-900/80 bg-slate-900 shadow-[0_20px_60px_rgba(15,23,42,0.55)] dark:border-white/20">
                        <div class="pointer-events-none absolute left-1/2 top-4 h-6 w-28 -translate-x-1/2 rounded-full bg-slate-800"></div>
                        <div class="pointer-events-none absolute bottom-4 left-1/2 h-1.5 w-28 -translate-x-1/2 rounded-full bg-slate-800"></div>
                        <div class="relative h-full w-full overflow-hidden rounded-[30px] bg-slate-950">
                            <img src="{{ asset('images/1.jpg') }}"
                                 alt="Mobile app screenshot"
                                 class="h-full w-full object-cover"
                                 loading="lazy"
                                 style="object-position: top center;">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="mt-32 border-t border-white/40 pt-10 text-sm text-slate-500 dark:border-white/10 dark:text-slate-400">
            <div class="flex flex-wrap items-center justify-between gap-6">
                <p>&copy; {{ now()->year }} Silo IT Support. All rights reserved.</p>
                <div class="flex flex-wrap gap-6">
                    <a href="mailto:silowebsolution@gmail.com" class="transition hover:text-slate-900 dark:hover:text-white">Contact</a>
                    <a href="#" class="transition hover:text-slate-900 dark:hover:text-white">Privacy &amp; Terms</a>
                </div>
            </div>
        </footer>
    </div>
</div>

