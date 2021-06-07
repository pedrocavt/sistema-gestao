{{$slot}}
<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" value="{{ old('nome')}}" placeholder="Nome" class="{{$classe}}" name="nome">
    @if ($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input type="text" value="{{ old('telefone')}}" placeholder="Telefone" class="{{$classe}}" name="telefone">
    {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input type="text" value="{{ old('email')}}" placeholder="E-mail" class="{{$classe}}" name="email">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select class="{{$classe}}" name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $motivo)
        <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}>{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <textarea class="{{$classe}}" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : "Prencha aqui sua mensagem"}}
    </textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>