                    {{$slot}}
                    @if($errors->any())
                        <div style="background-color: red; color: white;">
                            <!-- {{print_r($errors)}} -->
                            @foreach ($errors->all() as $erro)
                                {{$erro}}<br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('site.contato') }}" method="post">
                        @csrf
                        <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
                        @if($errors->has('nome'))
                            <div style="color: red;">
                                {{$errors->first('nome')}}
                            </div>
                        @endif
                        <br>
                        <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
                          @if($errors->has('telefone'))
                            <div style="color: red;">
                                {{$errors->first('telefone')}}
                            </div>
                        @endif
                        <br>
                        <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
                        @if($errors->has('email'))
                            <div style="color: red;">
                                {{$errors->first('email')}}
                            </div>
                        @endif                        
                        <br>
                        <select name="motivo_contatos_id" class="{{$classe}}">
                            <option value="">Qual o motivo do contato?</option>

                            @foreach ($motivo_contato as $key => $motivo)
                                <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}>{{$motivo->motivo_contato}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('motivo_contatos_id'))
                            <div style="color: red;">
                                {{$errors->first('motivo_contatos_id')}}
                            </div>
                        @endif                        
                        <br>
                        <textarea name="mensagem" class="{{$classe}}">@if (old('mensagem') != '') {{old('mensagem')}} @else Preencha aqui a sua mensagem @endif                        
                        </textarea>
                        @if($errors->has('mensagem'))
                            <div style="color: red;">
                                {{$errors->first('mensagem')}}
                            </div>
                        @endif
                        <br>
                        <button type="submit" class="{{$classe}}">ENVIAR</button>
                    </form>