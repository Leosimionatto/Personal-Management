<div class="modal-dialog">
    <div class="modal-content" style="width:58%;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="background-dark-green padding-12 text-center inline-block align-top" style="width:34%;position:absolute;left:0;bottom:0;top:0;">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/notes-tasks/png/014-browser-1.png') }}" width="60px">
                </div>

                <h4 class="white">Adicionar Comentário</h4>
            </div>
            <div class="inline-block" style="width:64%;margin-left:35%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <i class="fa fa-thermometer-three-quarters dark-green-color right big space-top-2"></i>

                    <div class="dots" style="width:90%;" title="{{ $step->nmetapa }}">
                        <b class="big">Adicionar Comentário <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> {{ $step->nmetapa }}</b>
                    </div>
                </div>
                <div class="block space-top-2 padding-6">
                    <form class="create-comment" style="padding-bottom:45px;">
                        <div class="alert alert-danger error" style="display:none;margin-bottom:4px;"></div>

                        <div class="block padding-4">
                            <div class="form-group">
                                <label for="descricao" class="form-label" style="font-size:15px;margin-top:0 !important;">Comentário</label>
                                <textarea name="descricao" class="form-text-area summernote" id="descricao"></textarea>
                            </div>

                            <input type="hidden" name="idetapa" value="{{ $step->id }}">
                        </div>
                        <div class="text-right" style="position:absolute;bottom:12px;right:10px">
                            <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                            <button class="success-button not-required">Confirmar <i class="fa fa-check white"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 180,
            focus: true,
            resize: false,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            disableResizeEditor: true
        });
    })
</script>