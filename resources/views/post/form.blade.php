<x-root>
    <h2>Create a blog post</h2>
    <form method="POST" action="/post">
        @csrf
        <div class="mb-3">
            <label for="heading" class="form-label">Post heading</label>
            <input type="text" class="form-control" name="heading" id="heading"/>
        </div>
        <div class="mb-3">
            <textarea style="visibility: hidden;" id="editor" name="content">Tja, tja bloggen!</textarea>
        </div>
        <div class="d-grid col-6 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg">Publish</button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link' ]
            } )
            .then( document.querySelector( '#editor' ).style.visibility = 'visible' )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-root>
