<x-layout.main title="Account">
    <x-form action="{{ route('logout') }}" class="col-md-6">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Exit from Account</button>
    </x-form>
</x-layout.main>

