<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Reporte</title>

</head>
<body style="margin: 0;
    height: 100%;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;">


<div style="position: absolute;
	top: 20%;
width: 700px;
	left: 50%;
	transform: translate(-50%, -50%);">
    <div>
        <h1 style="color:blue; background: #F1E231;">Reporte</h1>
        <table style="width: 700px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <thead>
            <tr>
                <th style="text-align: center; background-color: #55608f;">Usuario</th>
                <th style="text-align: center;background-color: #55608f;">Tipo de Usuario</th>
                <th style="text-align: center; background-color: #55608f;">Operacion</th>
                <th style="text-align: center; background-color: #55608f;">Fecha</th>
            </tr>
            </thead>
            @foreach($reportes as $reporte)
                <tbody class="divide-y bg-blue-100">

                <tr>
                    <td style="padding: 15px;background-color: rgba(255,255,255,0.2);color: #000000 ;">{{ $reporte->usuario }}</td>
                    <td style="padding: 15px;background-color: rgba(255,255,255,0.2);color: #000000 ;">{{ $reporte->tipo_usuario }}</td>
                    <td style="padding: 15px;background-color: rgba(255,255,255,0.2);color: #000000 ;">{{ $reporte->operacion}}</td>
                    <td style="padding: 15px;background-color: rgba(255,255,255,0.2);color: #000000 ;">{{ $reporte->fecha}}</td>

                </tr>
                </tbody>
            @endforeach
        </table>
        <p>reporte total: {{$total}}</p>
    </div>
</div>


</body>

</html>
