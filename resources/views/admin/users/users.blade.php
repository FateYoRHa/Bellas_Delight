<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">USER ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Role Description</th>
                        <th scope="col">Date Joined</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                        <td>{{ $user->display_name }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><button class="btn btn-success">Change Role</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <tr class="pageRow">
                <td colspan="3">
                    <div class="d-flex justify-content-center pt-4"> {{ $users->links() }} </div>
                </td>
            </tr>
        </div>
    </div>
</x-app-layout>
