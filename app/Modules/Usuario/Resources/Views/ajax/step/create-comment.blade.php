<div class="modal-dialog">
    <div class="modal-content" style="width:700px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#628D6E">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/notes-tasks/png/003-mail.png') }}" width="60px">
                </div>

                <h4 class="white">Adicionar Comentário</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <i class="fa fa-book dark-green-color right big space-top-2"></i>

                    <div class="dots" style="width:90%;" title="{{ $step->nmetapa }}">
                        <b class="big">{{ $step->nmetapa }} <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> Comentários</b>
                    </div>
                </div>

                <form action="" method="post" class="padding-12 space-top-2 create-comment-form" style="padding-top:0 !important;">
                    <div class="create-comment-error"></div>

                    <div class="form-group">
                        <label for="idvisualizador" class="form-label">Marcar Participante</label>
                        <select name="idvisualizador" class="form-control not-required" id="idvisualizador">
                            <option value="">Selecione uma opção</option>
                            @foreach($participants as $participant)
                                <option value="{{ $participant->id }}">{{ $participant->user->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom:0;">
                        <label for="descricao" class="form-label">Descrição dos Deveres</label>
                        <textarea name="descricao" class="form-control form-text-area required-summernote summernote" id="descricao" placeholder="Descrição de Exemplo..."></textarea>
                    </div>

                    <div class="form-group space-top-10 text-right">
                        <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                        <button class="success-button not-required submit-comment">Confirmar <i class="fa fa-check white"></i></button>
                    </div>

                    <input type="hidden" name="idetapa" value="{{ $step->id }}">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 125,
            focus: false,
            resize: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            disableResizeEditor: true
        });
    });
</script>
