<section>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body">
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <div class="form-outline w-100">
                                <form class="mt-2" name="create_platform" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <textarea required class="form-control" id="text" name="text" rows="4" style="background: #fff;" placeholder="Escribe algo..."
                                    @if(isset($comment))
                                    value= "{{$comment->text}}"
                                    @endif></textarea>
                                    <input class="form-control" id="usedTime" name="usedTime" type="number" required
                                    @if(isset($comment))
                                    value= "{{$comment->usedTime}}"
                                    @endif></input>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">
                                @if(isset($comment))
                                    Editar
                                @else
                                    Comentar    
                                @endif
                                </button>
                        </div>
                        </form>
                        <!--<button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>