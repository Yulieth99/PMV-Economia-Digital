<div class="following">
    <p class="text-blue-500 text-sm">Reportar este usuario</p>
    
    <button type="button" onclick="openModal('mymodalcentered')" class="bg-transparent hover:bg-blue-500 text-blue-300 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
      Denunciar
    </button>
</div>
<dialog id="mymodalcentered" class="bg-transparent z-0 relative w-screen h-screen">
    <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 transition-opacity opacity-0">
        <div class="bg-white flex roundeds w-1/2 relative">
            <div class="py-6 px-6 w-full">
                <h1>Denuncia este usuario</h1>
                <div class="mt-5 justify-start">
                    <form>
                        <div class="mt-9 mb-9 justify-start text-left text-blue-600">
                            <label>Escribe la razon de tu denuncia</label>
                            <textarea wire:model="message" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Comenta que te disgusto de este usuario" ></textarea> 
                            @error('message') <span class="error text-red-600">el campo esta vacio</span> @enderror
                        </div>
                        <div class="mt-9 mb-9">
                            <button wire:click="denunciar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3">
                                Denunciar
                            </button>
                            <button type="button" onclick="modalClose('mymodalcentered')" class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Cerrar
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</dialog>

<script>
    function openModal(key) {
        document.getElementById(key).showModal(); 
        document.body.setAttribute('style', 'overflow: hidden;'); 
        document.getElementById(key).children[0].scrollTop = 0; 
        document.getElementById(key).children[0].classList.remove('opacity-0'); 
        document.getElementById(key).children[0].classList.add('opacity-100')
    }

    function modalClose(key) {
        document.getElementById(key).children[0].classList.remove('opacity-100');
        document.getElementById(key).children[0].classList.add('opacity-0');
        setTimeout(function () {
            document.getElementById(key).close();
            document.body.removeAttribute('style');
        }, 100);
    }
</script>