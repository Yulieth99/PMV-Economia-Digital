<?php
        $categories = DB::table('categories')->select('id','name')->get();
        $deptos = DB::table('departaments')->select('id','name')->get();
        $municipios = DB::table('townshipes')->select('id','name','departament_id')->get();

?>



<div class="fex flex-col space-y-2 relative">
    <div id="btn-close-menu" class="absolute hidden -right-2 -top-5 text-gray-400 text-2xl hover:text-gray-900 hover:text-2xl cursor-pointer">
        <i  class="fas fa-times "></i>
    </div>
    <input class="w-full rounded text-lg p-1" type="button" value="{{ $title }}">
    {{-- BOTON FILTRAR --}}
    <a  href="f?" id="btnFiltrar">
        <div class="mt-4 w-full rounded text-lg text-center bg-gray border border-solid border-current b p-2">
            Filtrar
        </div>
    </a>
    {{-- INPUT CATEGORIA --}}
    <div >
        <p class="font-bold">Categoria</p>
        <select class="w-full rounded" name="Categorias" id="Categorias" onchange="change()">
            <option value="0">Todas</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

           
        </select>
    </div>
    {{-- INPUT DEPARTAMENTOS --}}
    <div >
        <p class="font-bold">Departamento</p>
        <select class="w-full rounded" name="Departamento" id="Departamento" onchange="changeDepto()">
            <option value="0">Todos</option>
            @foreach ($deptos as $depto)
                <option value="{{ $depto->id }}">{{ $depto->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- INPUT MUNICIPIOS --}}
    <div >
        <p class="font-bold">Municipio</p>
        <select class="w-full rounded" name="Municipio" id="Municipio" onchange="change()">
            <option value="0">Todos</option> 
        </select>
    </div>
    {{-- INPUT FECHA --}}
    <div >
        <p class="font-bold">Fecha de publicacion</p>
        <p>Desde:</p>
        <input onchange="change()" type="date" id="desde" class="rounded">
        <p>Hasta:</p>
        <input onchange="change()" type="date" id="hasta" class="rounded">
    </div>
    {{-- INPUT ESTADO --}}
    <div @if(!isset($userAd))class="hidden"@endif >
        <p class="font-bold">Estado del anuncio</p>
        <input checked class="rounded" type="checkbox"  id="estadoActivo" value="estadoActivo" onchange="change()">
            <label for="estadoActivo" >  Activo</label><br>
        <input checked class="rounded" type="checkbox"  id="estadoInactivo" value="estadoInactivo" onchange="change()">
            <label for="estadoInactivo" >  Inactivo</label>
    </div>
    
        {{-- BOTON CREAR ANUNCIO --}}
        <a  href="../../nuevo" id="btnFiltrar">
            <div class="mt-4 w-full rounded text-lg text-center bg-gray border border-solid border-current b p-2">
                Publicar un Anuncio
            </div>
        </a>




<script>
    let Categoria = 0;
    let Departamento = 0;
    let Municipio = 0;
    let Activo = 1;
    let Inactivo = 1;


    

    let municipios = <?php echo json_encode($municipios); ?>

    
  

    function change(){
        let url = 'f?';
        Categoria = $("#Categorias").val();
        Departamento = $('#Departamento').val();
        Municipio = $('#Municipio').val();
        Order = $('#selectOrder').val();
        Desde = $('#desde').val();
        Hasta = $('#hasta').val();
        if(document.getElementById('estadoActivo').checked){
            Activo = 1;
        }else{
            Activo = 0;
        }
        if(document.getElementById('estadoInactivo').checked){
            Inactivo = 1;
        }else{
            Inactivo = 0;
        }
        
        if(Categoria != 0){
            url += '&category='+ Categoria;
        }
        if(Departamento != 0){
            url += '&depto='+ Departamento;
        }
        if(Municipio != 0){
            url += '&muni='+ Municipio;
        }
        if(Activo == 0){
            url += '&noactivo=1';
        }
        if(Inactivo == 0){
            url += '&noinactivo=2';
        }
        if(Order != 0){
            url += '&order='+ Order;
        }

        if(Desde != ""){
            url += '&desde='+ Desde;
        }
        if(Hasta != ""){
            url += '&hasta='+ Hasta;
        }

        document.getElementById('btnFiltrar').href = url;
        window.locationf = '{{ asset("") }}' + url;

     
    }

    function changeDepto(){
        DepartamentoID = document.getElementById('Departamento').value;
        $('#Municipio').html('<option value="0">Todos</option>');
        
        municipios.forEach(muni => {
            if(muni.departament_id == DepartamentoID){
                $('#Municipio').append(`<option value="${muni.id}">${muni.name}</option>`);
            }
        });

        document.getElementById('Municipio').value = {{ $muni }};
        
        change();
    }

    $(document).ready(()=>{
        document.getElementById("Categorias").value = {{ $cat }};
        document.getElementById('Departamento').value = {{ $dep }};
        document.getElementById('selectOrder').value = {{ $order }};
        document.getElementById('desde').value = "{{ $desde }}";
        document.getElementById('hasta').value = "{{ $hasta }}";
        

        changeDepto();

        /* FECHA MAXIMA INPUT DATE */
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd < 10){
            dd ='0'+ dd;
        } 
        if(mm < 10){
            mm ='0'+ mm
        } 

        toda = yyyy+'-'+mm+'-'+dd;
        $('#fechaInicio').attr("max", toda);
        $('#fechaFin').attr("max", toda);

        yyyy -= 1;
        min = yyyy+'-'+mm+'-'+dd;
        $('#fechaInicio').attr("min", min);
        $('#fechaFin').attr("min", min);
        })

</script>


</div>