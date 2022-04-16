@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>PAGOS</h1>
@stop

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">NUEVO PAGO</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    
    @section('js')
    <script>
        
        const csrfToken=document.head.querySelector("[name~=csrf-token][content]").content;
        document.getElementById('propiedad_id').addEventListener('change',
        (e)=>{
            fetch('propiedad',{
                method :"POST",
                body : JSON.stringify({texto: e.target.value}),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN":csrfToken
                }
            }).then(response=>{
                return response.json()
            }).then(data=>{
                var id="",manzana="",lote="",zona="",estado="",cliente_id="",cliente="",obs_cliente="",categoria_id="",categoria="",obs_categoria="",fecha_adeudo="";
                for(let i in data.lista){
                    manzana+='<a class="text-success" value="'+data.lista[i].id+'">' +data.lista[i].manzana+ '</a>';
                    lote+='<a class="text-success" value="'+data.lista[i].id+'">' +data.lista[i].lote+'</a>';
                    zona+='<a class="text-success" value="'+data.lista[i].id+'">' +data.lista[i].zona+'</a>';
                    fecha_adeudo+= data.lista[i].fecha_adeudo;
                    id=data.lista[i].id;
                    if(data.lista[i].estado==1){
                        estado+='<a class="text-success" value="'+data.lista[i].id+'">' +'ACTIVO'+'</a>';
                    }else{
                        estado+='<a class="text-danger" value="'+data.lista[i].id+'">' +'INACTIVO (se recomienda actualizar el dato)'+'</a>';
                    }
                    if(data.lista[i].cliente_id==null){
                        cliente+='<a class="text-danger" value="'+data.lista[i].id+'">' +'NO HAY CLIENTE PARA MOSTRAR(se recomienda actualizar el dato)'+'</a>';
                    }else{
                        cliente_id+=data.lista[i].cliente_id;
                        obs_cliente="initial";
                    }
                    if(data.lista[i].categoria_id==null){
                        categoria+='<a class="text-danger" value="'+data.lista[i].id+'">'+'No tiene una categoria definida actualizar el dato es indispensable'+'</a>';
                        
                    }else{
                        categoria_id+=data.lista[i].categoria_id;
                        monto+=data.lista[i].categoria_id;
                        obs_categoria="initial";
                    }
                }
                document.getElementById("Manzana").innerHTML=manzana;
                document.getElementById("Lote").innerHTML=lote;
                document.getElementById("Zona").innerHTML=zona;
                document.getElementById("Estado").innerHTML=estado;
                document.getElementById("Cliente_id").value=cliente_id;
                document.getElementById("Cliente_id").style.display=obs_cliente;
                document.getElementById("cliente").innerHTML=cliente;
                document.getElementById("Categoria_id").value=categoria_id;
                document.getElementById("Categoria_id").style.display=obs_categoria;
                document.getElementById("categoria").innerHTML=categoria;
                document.getElementById("fecha_adeudo").value=fecha_adeudo;
                document.getElementById("crearpago").value=id;
                  
            }).catch(error=>console.error(error));
        }
        )

        document.getElementById("Cliente_id").addEventListener('click',(e)=>{
            fetch('obtenercliente',{
                method:"POST",
                body: JSON.stringify({texto:e.target.value}),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN": csrfToken
                }
            }).then(response=>{
                return response.json()
            }).then(data=>{
                var cliente="";
                for(let i in data.lista){
                    cliente+='<a class="text-success">'+data.lista[i].nombre+'</a>'+'&nbsp;'+'<a class="text-success">'+data.lista[i].apellidop+'</a>'+'&nbsp;'+'<a class="text-success">'+data.lista[i].apellidom+'</a>';
                }
                document.getElementById("cliente").innerHTML=cliente;
                document.getElementById("Cliente_id").style.display="none";
            }).catch(error=>console.error(error));
        })

        document.getElementById("Categoria_id").addEventListener('click',(e)=>{
            fetch('obtenercategoria',{
                method :"POST",
                body : JSON.stringify({texto:e.target.value}),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN": csrfToken
                }
            }).then(response=>{
                return response.json()
            }).then(data=>{
                var categoria="",monto="",mostrar_monto="";
                for(let i in data.lista){
                    categoria+='<a class="text-success">'+data.lista[i].descripcion+'</a>';
                    monto+=data.lista[i].monto_correspondiente;
                    mostrar_monto+='<strong class="text-primary">'+'$'+'</strong>'+'<strong class="text-primary">'+data.lista[i].monto_correspondiente+'</strong>';
                }
                document.getElementById("categoria").innerHTML=categoria;
                document.getElementById("Categoria_id").style.display="none";
                document.getElementById("monto").value=monto;
                document.getElementById("MostrarMonto").innerHTML=mostrar_monto;
            }).catch(error=>console.error(error));
        })

        document.getElementById("propiedad_id").addEventListener('change',(e)=>{
            fetch('obtenerfecha',{
                method :"POST",
                body : JSON.stringify({texto:e.target.value}),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN": csrfToken
                }
            }).then(response=>{
                return response.json()
            }).then(data=>{
                var fecha="";
                for(let i in data.fecha){
                    fecha+='<a class="text-primary">'+data.fecha[i]+'</a>';
                }
                var mes="";
                for(let i in data.nombre){
                    mes+='<a class="text-primary">'+data.nombre[i]+'</a>'
                }
                document.getElementById("fecha_adeudo").innerHTML=mes;
                document.getElementById("fecha").innerHTML=fecha;
               
                
            }).catch(error=>console.error(error));
        })

        document.getElementById("Continuarpago").addEventListener('click',(e)=>{
         const valor=document.getElementById("idpropiedad").value;
            fetch('obtenerfecha',{
                method :"POST",
                body : JSON.stringify({texto:valor}),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN": csrfToken
                }
            }).then(response=>{
                return response.json()
            }).then(data=>{
                var fecha="",input="";
                for(let i in data.fecha){
                    fecha+=data.fecha[i];
                    input+='<input id="fechaactualizada" readonly class="text-primary" value="'+data.fecha[i]+'">'
                }
                document.getElementById("nuevafecha").value=fecha;
               document.getElementById("Confirmarpago").style.display="initial"; 
               document.getElementById("Continuarpago").style.display="none";
               document.getElementById("insertarinput").innerHTML=input;
            }).catch(error=>console.error(error));
        })
        
        
    


        document.getElementById("Confirmarpago").addEventListener('click',(e)=>{
            const idpropiedad=document.getElementById("idpropiedad").value;
            const fecha=new Date(document.getElementById("nuevafecha").value);
            const nuevafecha=fecha.getFullYear() + "-" + (fecha.getMonth()+1) + "-" + (fecha.getDate()+1);
            
            fetch(idpropiedad+'/actualizarfecha',{
                method :"PUT",
                body : JSON.stringify({
                    fecha_adeudo: nuevafecha
                }),
                headers:{
                    'Content-Type':'application/json',
                    "X-CSRF-TOKEN": csrfToken
                }
            }).then(response=>{
                return response.json();
            }).then(data=>{
                console.log(data)
            }).catch(error=>console.error(error));
        })
       
    </script>
    
    @stop    
