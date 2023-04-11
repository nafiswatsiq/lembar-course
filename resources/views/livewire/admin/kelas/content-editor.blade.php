<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" wire:model="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div> 
        <div class="mb-6" wire:ignore>
            {{-- <textarea wire:model="content"></textarea> --}}
            <textarea id="summernote" name="content" wire:model.lazy="content">
                {!! $content !!}
            </textarea>
            {{-- <input type="file" id="image" wire:model="image"> --}}
        </div>
        <div class="flex justify-between">
            <button type="submit" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Save</button>
            <button type="button" wire:click="delete" class="flex items-center text-red-600 py-2.5 px-5 mr-2 mb-2 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span>Hapus</span>
                <svg class="fill-red-600 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="trash-alt">
                    <path fill="" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#summernote').summernote({
      placeholder: 'Text here...',
      tabsize: 2,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
        ['custom', ['fileInput', 'textHighligt']],
      ],
      height: 300,
      callbacks: {
        onChange: function(contents, $editable) {
            @this.set('content', contents);
        },
      },
    //   buttons: {
    //         fileInput: function() {
    //             const ui = $.summernote.ui;
    //             const button = ui.button({
    //                 contents: '<i class="fa fa-image"/>',
    //                 tooltip: 'Insert image',
    //                 click: function() {
    //                     const input = document.createElement('input');
    //                     input.type = 'file';
    //                     input.accept = 'image/*';
    //                     input.onchange = function(event) {
    //                         const file = event.target.files[0];
    //                         const reader = new FileReader();
    //                         reader.onload = function() {
    //                             const img = document.createElement('img');
    //                             img.src = reader.result;
    //                             $('#summernote').summernote('insertNode', img);
    //                         }
    //                         reader.readAsDataURL(file);
    //                     };
    //                     input.click();
    //                 }
    //             });
    //             return button.render();
    //         },

    //         textHighligt: function() {
    //             const ui = $.summernote.ui;
    //             const button = ui.button({
    //                 contents: '<i class="fa fa-text-width"/>',
    //                 tooltip: 'Text Highligt',
    //                 click: function() {
                        
    //                 }
    //             });
    //             return button.render();
    //         }
    //     }
    });
});
</script>