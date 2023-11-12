@extends('layouts.app')
@section('title', 'Liste des usagers')
@section('content')
    <div>
        <div class="auth__header">
            <h1 class="auth_header_u-list-title">Liste des usagers</h1>
        </div>

        <div class="auth_user-list">
            <table>
                <thead>
                    <tr>
                        <th class="auth_user-list_th">Id</th>
                        <th class="auth_user-list_th">Nom</th>
                        <th class="auth_user-list_th">Prénom</th>
                        <th class="auth_user-list_th"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Affiche les utilisateurs -->
                    @forelse($users as $user)
                        <tr>
                            <td class="auth_user-list_td">{{ $user->id }}</td>
                            <td class="auth_user-list_td">{{ $user->nom }}</td>
                            <td class="auth_user-list_td">{{ $user->prenom }}</td>
                            <td class="auth_user-list_td">
                            <form action="{{ route('user.delete', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input class="auth_user-list_btn" type="submit" value="supprimer">
                            </form>
                            </td>
                        </tr>
                    @empty
                        <td class="auth_user-list_td" colspan="4">Aucun usagé disponible</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>   
@endsection