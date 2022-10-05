<!--Importando Script Jquery-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<style>
    strong{
        color: red;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar instituição') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="form-row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="width: 100%; margin-top: 50px; margin-bottom: 50px;">
                    <div class="card-header">
                        Instituições > Cadastrar instituição
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Cadastrar Instituicao</h5>
                        @if(session('success'))
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 5px;">
                                    <div class="alert alert-success" role="alert">
                                        <p>{{session('success')}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form id="criar-instituicao-form" method="POST" action="{{route('instituicao.criar')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="image">Imagem</label>
                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">

                                    @error('image')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="nome">Nome<strong>*</strong></label>
                                    <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" autofocus required value="{{old('nome')}}">

                                    @error('nome')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="categoria">Categoria<strong>*</strong></label>
                                    <select type="text" id="categoria" name="categoria" class="form-control @error('categoria') is-invalid @enderror" required>
                                        <option value="">Selecione uma categoria</option>
                                        <option value="Instituto Paulo Freire"
                                        @if(old('categoria') == "Instituto Paulo Freire") selected @endif>Instituto Paulo Freire</option>
                                        <option value="Cátedra Paulo Freire"
                                        @if(old('categoria') == "Cátedra Paulo Freire") selected @endif>Cátedra Paulo Freire</option>
                                        <option value="Centro Paulo Freire"
                                        @if(old('categoria') == "Centro Paulo Freire") selected @endif>Centro Paulo Freire</option>
                                        <option value="Grupo/Coletivo Paulo Freire"
                                        @if(old('categoria') == "Grupo/Coletivo Paulo Freire") selected @endif>Grupo/Coletivo Paulo Freire</option>
                                        <option value="Homenagem"
                                        @if(old('categoria') == "Homenagem") selected @endif>Homenagem</option>
                                    </select>

                                    @error('categoria')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="pais">País<strong>*</strong></label>
                                    <select type="text" id="pais" name="pais" class="form-control @error('pais') is-invalid @enderror" required>
                                        <option value="">Selecione um país</option>
                                       @php
                                            $paises = \App\Countries::getLista();
                                       @endphp
                                       @foreach($paises as $key => $nome)
                                            <option value="{{$nome}}"
                                            @if(old('pais') == $nome) selected @endif>{{$nome}}</option>
                                        @endforeach
                                    </select>

                                    @error('pais')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="cep">Cep</label>
                                    <input type="text" id="cep" name="cep" class="form-control @error('cep') is-invalid @enderror" value="{{old('cep')}}">

                                    @error('cep')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" id="estado" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{old('estado')}}">

                                    @error('estado')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" class="form-control @error('cidade') is-invalid @enderror" value="{{old('cidade')}}">

                                    @error('cidade')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" id="endereco" name="endereco" class="form-control @error('endereco') is-invalid @enderror" value="{{old('endereco')}}">

                                    @error('endereco')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" class="form-control @error('telefone') is-invalid @enderror" value="{{old('telefone')}}">

                                    @error('telefone')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">

                                    @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="site">Site</label>
                                    <input type="text" id="site" name="site" class="form-control @error('site') is-invalid @enderror" value="{{old('site')}}">

                                    @error('site')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="datafundacao">Data da fundação</label>
                                    <input type="date" id="datafundacao" name="datafundacao" class="form-control @error('datafundacao') is-invalid @enderror" value="{{old('datafundacao')}}">

                                    @error('datafundacao')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="coordenador">Coordenador</label>
                                    <input type="text" id="coordenador" name="coordenador" class="form-control @error('coordenador') is-invalid @enderror" value="{{old('coordenador')}}">

                                    @error('coordenador')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label for="latitude">Latitude<strong>*</strong></label>
                                    <input type="number" min="-90" max="90" step="0.000001" id="latitude" name="latitude"
                                           class="form-control @error('latitude') is-invalid @enderror" required value="{{old('latitude')}}"
                                            placeholder="Ex: 41.40338">

                                    @error('latitude')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="longitude">Longitude<strong>*</strong></label>
                                    <input type="number" min="-180" max="180" step="0.000001" id="longitude" name="longitude"
                                           class="form-control @error('longitude') is-invalid @enderror" required value="{{old('longitude')}}"
                                           placeholder="Ex: 2.17403">

                                    @error('longitude')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <label for="info">Outras Informações</label>
                                    <input type="text" id="info" name="informacao" class="form-control @error('informacao') is-invalid @enderror" value="{{old('informacao')}}">

                                    @error('informacao')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="form-row">
                            <div class="col-md-6 form-group"></div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-success" form="criar-instituicao-form" style="width: 100%">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!--Preenchimento de dados pelo CEP-->
<script type="text/javascript">

    $("#cep").focusout(function(){
        //Início do Comando AJAX
        $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            success: function(resposta){
                $("#endereco").val(resposta.logradouro);
                $("#bairro").val(resposta.bairro);
                //$("#complemento").val(resposta.complemento);
                $("#cidade").val(resposta.localidade);
               // $("#teste").val(resposta.uf);
                switch(resposta.uf){
                    case "AC":  $("#estado").val("Acre");break;
                    case "AL":  $("#estado").val("Alagoas");break;
                    case "AM":  $("#estado").val("Amazonas");break;
                    case "BA":  $("#estado").val("Bahia");break;
                    case "CE":  $("#estado").val("Ceará");break;
                    case "DF":  $("#estado").val("Distrito Federal");break;
                    case "ES":  $("#estado").val("Espirito Santo");break;
                    case "MA":  $("#estado").val("Maranhão");break;
                    case "MT":  $("#estado").val("Mato Grosso");break;
                    case "MS":  $("#estado").val("Mato Grosso do Sul");break;
                    case "MG":  $("#estado").val("Minas Gerais");break;
                    case "PA":  $("#estado").val("Pará");break;
                    case "PB":  $("#estado").val("Paraiba");break;
                    case "PR":  $("#estado").val("Paraná");break;
                    case "PE":  $("#estado").val("Pernambuco");break;
                    case "RJ":  $("#estado").val("Rio de Janeiro");break;
                    case "RN":  $("#estado").val("Rio Grande do Norte");break;
                    case "RS":  $("#estado").val("Rio Grande do Sul");break;
                    case "RO":  $("#estado").val("Rondônia");break;
                    case "RR":  $("#estado").val("Roraima");break;
                    case "SC":  $("#estado").val("Santa Catarina");break;
                    case "SP":  $("#estado").val("São Paulo");break;
                    case "SE":  $("#estado").val("Sergipe");break;
                    case "TO":  $("#estado").val("Tocantins");break;
                }
            }

        });
    });
</script>
