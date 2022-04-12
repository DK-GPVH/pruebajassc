@extends('adminlte::page')

@section('title', 'ADMIN')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')


<div class="row">
    <div class="col-md-8">
        <canvas id="Chartbalancetrimestral"></canvas>  
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-5">
        <canvas id="Chartbalancemes"></canvas>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <canvas id="Chartnrodepagos"></canvas>
    </div>
</div>
    
<br>


    <div class="m-0 row justify-content-center">
        <div class="col-md-5">
        <canvas id="Chartnrodeclientes"></canvas>
        </div>
    </div>




  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        var clientes=['Registro de clientes','Registro de propiedades'],cantidad_clientes=[],nrodeoperaciones=[],mesactual=[],trimestral_meses=[],trimestral_montos=[];
        $( document ).ready(function() {
            
          
            console.log( "ready!" );
            fetch('api/clientes',{
                method :"GET",
            }).then(response=>{
                return response.json();
            }).then(data=>{
                    const elementos = data.length;
                    cantidad_clientes.push(elementos);                      
            }).catch(error=>console.error(error));
      
            
            fetch('api/propiedades',{
                method:"GET"
            }).then(response=>{
                return response.json();
            }).then(data=>{
                const datapropiedades = data.length;
                cantidad_clientes.push(datapropiedades);
            }).catch(error=>console.error(error));

            fetch('api/estadistica',{
                method:"GET",
            }).then(response=>{
                return response.json();
            }).then(data=>{
                const total = data['total'],realizado= data['pago_realizado'],error=data['pago_error'];
                nrodeoperaciones.push(total,realizado,error);
            }).catch(error=>console.error(error));


            fetch('api/balancemensual',{
                method: "GET"
            }).then(response=>{
                return response.json();
            }).then(data=>{
                const total = data['fecha_total'],realizado= data['fecha_realizado'],error=data['fecha_error'];
                mesactual.push(total,realizado,error);
            }).catch(error=>console.error(error));



            fetch('api/balancetrimestral',{
                method:"GET",
            }).then(response=>{
                return response.json();
            }).then(data=>{
               const transanterior= data['mes_trasanterior'],anterior= data['mes_anterior'],actual=data['mes_actual'];
               trimestral_meses.push(transanterior,anterior,actual);
               const monto1=data['fecha_realizado_trasanterior'],monto2= data['fecha_realizado_anterior'],monto3=data['fecha_realizado_actual'];
               trimestral_montos.push(monto1,monto2,monto3);
            }).catch(error=>console.error(error));
      //final cargar documento
        });
     
     
     const ctx = document.getElementById('Chartnrodeclientes').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: clientes,
        datasets: [{
            label: 'Contador de registros',
            data: cantidad_clientes,
            backgroundColor: [
                'rgba(15, 234, 248)',
                'rgba(50, 249, 6,0.2)'
            ],
            hoverOffset: 4
        }]
    },
});

    const bardatostx = document.getElementById('Chartnrodepagos').getContext('2d');
    const myChart2 = new Chart(bardatostx, {
    type: 'bar',
    data: {
        labels: ['Total', 'Pagos realizados', 'Pagos erroneos'],
        datasets: [{
            label: 'N° de operaciones realizadas',
            data: nrodeoperaciones,
            backgroundColor: [
                'rgba(0, 255, 255, 0.2)',
                'rgba(50, 249, 6,0.2)',
                'rgba(255,0, 0, 0.2)',
                
            ],
            borderColor: [
                'rgba(0, 255, 255, 1)',
                'rgba(50, 249, 6, 1)',
                'rgba(255,0, 0, 1)',
                
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const balancemestx = document.getElementById('Chartbalancemes').getContext('2d');
    const myChart3 = new Chart(balancemestx, {
    type: 'bar',
    data: {
        labels: ['Total', 'Pagos realizados', 'Pagos erroneos'],
        datasets: [{
            label: 'Montos del mes actual',
            data: mesactual,
            backgroundColor: [
                'rgba(0, 255, 255, 0.2)',
                'rgba(50, 249, 6,0.2)',
                'rgba(255,0, 0, 0.2)',
                
            ],
            borderColor: [
                'rgba(0, 255, 255, 1)',
                'rgba(50, 249, 6, 1)',
                'rgba(255,0, 0, 1)',
                
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const balancetrimestraltx = document.getElementById('Chartbalancetrimestral').getContext('2d');
    const myChart4 = new Chart(balancetrimestraltx, {
    type: 'line',
    data: {
        labels: trimestral_meses,
        datasets: [{
        label: 'Monto neto mensual',
        data: trimestral_montos,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        }]
    }
});
    
</script>
@stop