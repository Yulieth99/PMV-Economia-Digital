<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
         
        <div class="py-6 w-100">
            <div class="w-50 py-4  sm:px-6 lg:px-8" style="float: left">
                @if (session('success'))
                <div class="to-blue-200">
                     {{session('success')}}
                </div>
                @endif
                <h2>CREA UN ANUNCIO</h2>
                <form action="">
                    <div class="mt-5">
                        <label  class="inline-block w-32 font-bold">Titulo</label>
                        <textarea name="titulodelAnuncio"
                        class="appearance-none block  bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="titulodelAnuncio" cols="60" rows="3"  placeholder="Escriba un titulo para su anuncio" ></textarea> 
                            @error('titulodelAnuncio') <span class="error text-red-600">el titulo del anuncio es obligatoria</span> @enderror
                    </div>

                    <div class="mt-5">
                        <label  class="inline-block w-32 font-bold">Descripcion</label>
                        <textarea name="descripciondelAnuncio"
                        class="appearance-none block  bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="descripciondelAnuncio" cols="60" rows="3"  placeholder="Describa las cualidades de lo que quiere vender" ></textarea> 
                            @error('descripciondelAnuncio') <span class="error text-red-600">la descripcion del anuncio es obligatoria</span> @enderror
                    
                    </div>

                            
                    <div class="mb-8 mt-5">
                        <label class="inline-block w-32 font-bold">Categoria:</label>
                        <select name="categoria" wire:model="categoria" 
                            class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value='-1'>Seleccione una categoria</option>
                                @foreach($categories as $category)
                                    <option value={{ $category->id }}> {{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('categoria') <br><span class="error text-red-600">la categoria es obligatoria</span> @enderror
                    </div>

                    <div class="mb-8">
                        <label class="inline-block w-32 font-bold">Departamento:</label>
                        <select name="departamento" wire:model="departamento" 
                            class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value='-1'>Seleccione un departamento</option>
                                @foreach($departaments as $departament)
                                    <option value={{ $departament->id }}> {{ $departament->name }}</option>
                                @endforeach
                        </select>
                        @error('departamento') <br><span class="error text-red-600">el departamento es obligatorio</span> @enderror
                    </div>

                    <div class="mb-8">
                        <label class="inline-block w-32 font-bold">Municipio:</label>
                        <select name="municipio" wire:model="municipio" 
                            class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value='-1'>Seleccione un municipio</option>
                                @foreach($townships as $township)
                                    @if($township->departament_id == $departamento)
                                       <option value={{ $township->id }}> {{ $township->name }}</option>
                                    @endif
                                @endforeach
                        </select>
                        
                        @error('municipio') <br><span class="error text-red-600">el municipio es obligatorio</span> @enderror
                    </div>
                    
                    
                    <br>
    
                    <button wire:click="guardar"  type="button"
                    class="bg-white text-red-800 font-semibold py-2 px-4 border border-red-400 rounded shadow">
                        Publicar Anuncio
                    </button>  
                </form>              
                
            </div>
            <div class="p-5" style="float: left; width: 600px"  >
                <h1 class="py-4 inline-block font-bold">Información del Producto</h1>
                <br>
                <form action="">
                    <div class="m-4 w-100">
                        <label  class="inline-block w-32 font-bold">Precio:</label>
                        <input wire:model="precio" class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                        type="number" placeholder="0.0">
                        <br>
                        @error('precio') <span class="error text-red-600">el precio del producto es obligatorio</span> @enderror
                    </div>

                    <div class="m-4 w-100">
                        <label  class="inline-block w-32 font-bold">Estado:</label>
                        <select name="contenido" wire:model="contenido" 
                        class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value='-1'>Seleccione un estado</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Usado">Usado</option>
                        </select>
                        <br>
                        @error('contenido') <span class="error text-red-600">el estado del producto es obligatorio</span> @enderror
                    </div>

                    <div class="m-4 w-100">
                        <label  class="inline-block w-32 font-bold">Moneda:</label>
                        <select name="moneda" wire:model="moneda" 
                            class=" w-80 p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value='-1'>Tipo de moneda</option>
                                @foreach($moneds as $moned)
                                    <option value={{ $moned->id }}> {{ $moned->currency_type }}</option>
                                @endforeach
                        </select>
                        
                        @error('moneda') <br><span class="error text-red-600">la moneda es obligatoria</span> @enderror
                    </div>

                    <div class="m-4 w-100">
                        <label class="inline-block w-32 font-bold">Subir imagenes</label> <br>
                        <input type="file" wire:model="imagenes" multiple accept="image/*" class="mt-5 py-8 p-2 px-4 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        <br>
                        @error('imagenes.*') <span class="error text-red-600">la imagen del producto es obligatoria</span> @enderror
                    </div>
                    
                </form>


            </div>
        </div>

    
</div>
