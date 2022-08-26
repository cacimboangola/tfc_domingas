<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha nº{{$doador->id }} {{$doador->nome }}</title>
    
    <style>
    .invoice-box {
        max-width: 600px;
        margin: auto;
        padding: 30px;
        {{--  border: 1px solid #eee;  --}}
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 25px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .title2{
        text-align: center;
        margin-bottom: -30px;
        margin-top: -30px;
    },
    .mg{
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                           <tr>
                            <td class="title">
                                <h1 class="title2" style="font-size: 25px">CENTRO NACIONAL DE SANGUE</h1> 
                                <h2 class="mg" style="font-size: 15px">FICHA DE DOADOR DE SANGUE</h2>
                             </td>
                           </tr>
                            
                            <td>
                              Doador.nº {{$doador->id}}<br>
                              GRUPO: {{$doador->grupo->tipo}}<br>
                              Data: {{$doador->created_at}}<br>
                          
                              <hr style=" border: 1px solid #eee">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                              Nome<br>
                              Género<br>
                              Data de Nasc.<br>
                              Nº BI<br>
                              Telefone<br>
                              Província<br>
                              Morada<br>
                              Profissão<br>
                            </td>
                            
                            <td>
                              {{$doador->nome}}<br>
                              {{$doador->sexo}}<br>
                              {{$doador->dataNascimento}}<br>
                              {{$doador->bi}}<br>
                              +(244) {{$doador->telefone}}<br>
                              {{$doador->province->nome}}<br>
                              {{$doador->endereco}}<br>
                              {{$doador->profissao}}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                  EXAMES
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="details">
                @foreach ($doadorExames as $exame)
                <tr>
                    <td> {{$exame->nome}}</td>
                </td>
                @endforeach
            </tr>
            
            <tr class="heading">
              <td>
                DOAÇÕES
              </td>
              
              <td>
                 
              </td>
          </tr>
          
          <tr class="details">
              
            @foreach ($doadorDoacoes as $doacao)
            <tr>
              <td>Cód. {{$doacao->id}} - {{$doacao->motivo}} - {{$doacao->created_at->format('d/m/y h:i')}}</td>
            </tr>
            @endforeach
              
              <td>
                 
              </td>
          </tr>

          <tr class="heading">
            <td>
              OBS
            </td>
            
            <td>
               
            </td>
        </tr>
        
        <tr class="details">
            <td>
              {{$doador->descricao}}
            </td>
            
            <td>
               
            </td>
        </tr>
         
        </table>
    </div>
</body>
</html>