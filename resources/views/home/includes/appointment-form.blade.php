<form method="POST" action="#" class="space-y-5">
    @csrf
    {{-- Nombre y apellido --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="space-y-1.5">
            <label for="name" class="block text-sm font-semibold text-[#1F1F1F]">
                Nombre <span class="text-[#B0393F]">*</span>
            </label>

            <input id="name" name="name" type="text" placeholder="Tu nombre" required autocomplete="given-name"
                class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition placeholder:text-[#9B9693] focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
        </div>

        <div class="space-y-1.5">
            <label for="last_name" class="block text-sm font-semibold text-[#1F1F1F]">
                Apellido <span class="text-[#B0393F]">*</span>
            </label>

            <input id="last_name" name="last_name" type="text" placeholder="Tu apellido" required
                autocomplete="family-name"
                class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition placeholder:text-[#9B9693] focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
        </div>
    </div>

    {{-- Correo --}}
    <div class="space-y-1.5">
        <label for="email" class="block text-sm font-semibold text-[#1F1F1F]">
            Correo electrónico <span class="text-[#B0393F]">*</span>
        </label>

        <input id="email" name="email" type="email" placeholder="correo@ejemplo.com" required
            autocomplete="email"
            class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition placeholder:text-[#9B9693] focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
    </div>

    {{-- Teléfono --}}
    <div class="space-y-1.5">
        <label for="phone" class="block text-sm font-semibold text-[#1F1F1F]">
            WhatsApp / Teléfono <span class="text-[#B0393F]">*</span>
        </label>

        <input id="phone" name="phone" type="tel" placeholder="+52 999 000 0000" required autocomplete="tel"
            class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition placeholder:text-[#9B9693] focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
    </div>

    {{-- Servicio y fecha --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div class="space-y-1.5">
            <label for="service" class="block text-sm font-semibold text-[#1F1F1F]">
                Servicio de interés
            </label>

            <select id="service" name="service"
                class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
                <option value="">Selecciona un servicio…</option>
                <option value="diagnostico">Diagnóstico gratuito</option>
                <option value="asesoria">Asesoría y consultoría personal</option>
                <option value="sat">Gestión y cumplimiento ante el SAT</option>
                <option value="nomina">Nómina, IMSS y Hacienda Estatal</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="space-y-1.5">
            <label for="preferred_date" class="block text-sm font-semibold text-[#1F1F1F]">
                Fecha preferida
            </label>

            <input id="preferred_date" name="preferred_date" type="date"
                class="block w-full rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10">
        </div>
    </div>

    {{-- Mensaje --}}
    <div class="space-y-1.5">
        <label for="message" class="block text-sm font-semibold text-[#1F1F1F]">
            Mensaje
        </label>

        <textarea id="message" name="message" rows="4" placeholder="Cuéntanos brevemente tu situación…"
            class="block w-full resize-none rounded-lg border border-[#E4DFDC] bg-white px-4 py-3 text-sm text-[#1F1F1F] shadow-sm outline-none transition placeholder:text-[#9B9693] focus:border-[#B0393F] focus:ring-2 focus:ring-[#B0393F]/10"></textarea>
    </div>

    {{-- Aviso --}}
    <div class="rounded-xl border border-[#E4DFDC] bg-[#F9F6F3] p-2">
        <div class="flex gap-3">
            <p class="text-xs leading-6 text-[#6B6568]">
                No necesitas iniciar sesión para enviar esta solicitud. Si ya tienes cuenta, podrás ver tus citas desde
                tu panel.
            </p>
        </div>
    </div>

    {{-- Botón --}}
    <button type="submit"
        class="inline-flex w-full items-center justify-center rounded-lg bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-[#B0393F]/20 transition hover:bg-[#8a2d33] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#B0393F]/20">
        Enviar solicitud
    </button>
</form>
