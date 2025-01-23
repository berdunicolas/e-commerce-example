<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="emailImput" class="form-label">Correo</label>
          <input type="email" name="email" class="form-control" id="emailImput" aria-describedby="emailHelp">
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
          <label for="passwordImput" class="form-label">Contraseña</label>
          <input type="password" name="password" class="form-control" id="passwordImput">
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" name="remember" class="form-check-input" id="check">
          <label class="form-check-label" for="check">Recordar sesión</label>
        </div>
        <button type="submit" class="mb-1 btn bg-cus-primary w-100">Iniciar sesión</button>
        <div class="text-end">
            <a class="link-dark" href="{{ route('password.request') }}">
                Olvide mi contraseña
            </a>
        </div>
    </form>
</x-guest-layout>