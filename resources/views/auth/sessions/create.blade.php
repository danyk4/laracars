<x-layout.guest title="Create User" h1="Create User">
    <div class="row">
        <x-form action="{{ route('login') }}" class="col-md-6">
            <div class="mb-3 ">
                <x-label for="email" class="form-label"/>
                <x-input name="email" class="form-control"/>
                <x-error field="email" class="text-danger fs-6"/>
            </div>

            <div class="mb-3 ">
                <x-label for="password" class="form-label"/>
                <x-input name="password" type="password" class="form-control"/>
                <x-error field="password" class="text-danger fs-6"/>
            </div>
            <div class="mb-3 ">
                <x-checkbox name="remember"/>&nbsp;Remember me
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </x-form>
    </div>
</x-layout.guest>
