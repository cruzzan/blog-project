@extends('root')

@section('content')
    <h2>Create a blog post</h2>
    <form method="POST" action="@if( isset($post)) {{ route('post.update', ['post' => $post->id]) }} @else {{ route('post.store') }} @endif">
        @csrf
        <div class="mb-3">
            <label for="heading" class="form-label">Post heading</label>
            <input type="text" class="form-control" name="heading" id="heading" value="@if( isset($post)) {{ $post->heading }} @endif"/>
        </div>
        <div class="mb-3">
            <textarea style="visibility: hidden;" id="editor" name="content">@if( isset($post)) {{ $post->content }} @else Tja, tja bloggen! @endif</textarea>
        </div>
        <div class="d-grid col-6 mx-auto">
            <button type="submit" class="btn btn-primary btn-lg">Publish</button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
    <script>
        CKEDITOR.ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'heading', 'bold', 'italic', 'underline', 'strikethrough', 'bulletedList', 'numberedList', 'code', 'codeBlock', 'blockQuote', 'link', 'horizontalLine' ],
                heading: {
                    options: [
                        { model: 'heading1', view: {name: 'h3', classes: 'display-3'}, title: 'Heading 1', class: 'display-3' },
                        { model: 'heading2', view: {name: 'h5', classes: 'display-5'}, title: 'Heading 2', class: 'display-5' },
                        { model: 'heading3', view: {name: 'h5', classes: ['display-5', 'text-muted']}, title: 'Heading 2 muted', class: 'display-5 text-muted' },
                        { model: 'paragraph', view: {name: 'p'}, title: 'Paragraph'}
                    ]
                },
                removePlugins: [
                    'ExportPdf',
                    'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType'
                ]
            } )
            .then( document.querySelector( '#editor' ).style.visibility = 'visible' )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
