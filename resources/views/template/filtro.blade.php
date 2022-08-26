<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lista</title>
    {{--  <link rel="stylesheet" href="style.css" media="all" />  --}}
    <link rel="stylesheet" href="{{ asset('css/users.css') }}" media="all" />
  </head>



  <body>
    <header class="clearfix">
      <h1>{{ $mes }} / {{ $ano }}</h1>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#</th>
            <th class="desc">NOME</th>
            <th>GÉNERO</th>
            <th>BILHETE</th>
            <th>PROVÍNCIA</th>
            <th>TELEFONE</th>
            <th>DATA</th>
          </tr>
        </thead>
        <tbody>
		    @foreach($doadores as $doador)
          <tr>
            <td class="service">{{$doador->id }}</td>
            <td class="desc">{{$doador->nome }}</td>
            <td class="unit">{{$doador->sexo }}</td>
            <td class="qty">{{$doador->bi }}</td>
            <td class="total">{{$doador->province->nome}}</td>
            <td class="total">{{$doador->telefone}}</td>
            <td class="total">{{$doador->created_at->format('d/m/Y')}}</td>
          </tr>
		    @endforeach
        
         
        </tbody>
      </table>
    </main>
    <footer>
      
    </footer>
  </body>
</html>