<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <section class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Painel Administrativo</h2>
            <p class="text-slate-600">Resumo rápido do sistema para tomada de decisão.</p>
        </div>
        <!-- CORREÇÃO: Link ajustado para abrir a tela de cadastro -->
        <a href="/usuarios/create" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700 transition">
            Novo registro
        </a>
    </section>

    <section class="mt-8 grid gap-4 md:grid-cols-3">
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Projetos ativos</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">12</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Usuários cadastrados</p>
            <p class="mt-2 text-3xl font-bold text-slate-900">{{ App\Models\User::count() }}</p>
        </article>
        <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Pendências</p>
            <p class="mt-2 text-3xl font-bold text-amber-600">5</p>
        </article>
    </section>

    <section class="mt-8 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h3 class="text-xl font-semibold text-slate-900">Usuários Registrados</h3>

        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full border-collapse text-left">
                <thead>
                    <tr class="border-b border-slate-200 text-sm text-slate-500">
                        <th class="py-3 px-2">Nome</th>
                        <th class="py-3 px-2">E-mail</th>
                        <th class="py-3 px-2">Data de Cadastro</th>
                        <!-- ADICIONADO: Cabeçalho para as Ações -->
                        <th class="py-3 px-2 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-700">
                    @php
                        // Nota: O ideal é que $usuarios venha do Controller, mas mantivemos a busca aqui para seu teste.
                        $users = $usuarios ?? App\Models\User::orderBy('name', 'asc')->get();
                    @endphp

                    @foreach ($users as $user)
                        <tr class="border-b border-slate-100 hover:bg-slate-50">
                            <td class="py-3 px-2 font-medium text-slate-900">{{ $user->name }}</td>
                            <td class="py-3 px-2 text-slate-600">{{ $user->email }}</td>
                            <td class="py-3 px-2 text-slate-500">{{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}</td>
                            
                            <!-- ADICIONADO: Botão de Editar -->
                            <td class="py-3 px-2 text-right">
                                <a href="/usuarios/{{ $user->id }}/editar" 
                                   class="inline-flex items-center rounded-md bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-600 hover:bg-indigo-100 transition">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <footer class="mt-8 rounded-xl bg-slate-900 px-6 py-4 text-sm text-slate-300">
        <div class="flex flex-wrap items-center justify-between gap-2">
            <p>© {{ date('Y') }} Painel Administrativo</p>
            <p>Versão 1.0.0</p>
        </div>
    </footer>
@endsection