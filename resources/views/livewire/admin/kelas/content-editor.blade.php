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
        </div>
        <div class="flex justify-between">
            <div class="flex gap-2">
                <button type="submit" class=" text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Save</button>
                <button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 type="button">
                    Add Code
                </button>
            </div>
            <button type="button" wire:click="delete" class="flex items-center text-red-600 py-2.5 px-5 mr-2 mb-2 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                <span>Hapus</span>
                <svg class="fill-red-600 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="trash-alt">
                    <path fill="" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Code
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form class="space-y-6" action="#">
                    <div>
                        <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Bahasa</label>
                        <select id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected disabled>Pilih Bahasa Pemrograman</option>
                          @foreach ($programingLangs as $lang)
                              <option value="{{ $lang->name }}">{{ $lang->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div>
                        <textarea id="inputCode" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button data-modal-hide="defaultModal" onclick="getValueCode()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('modal');
    const closeModalButton = document.getElementById('modal-close');
  
    closeModalButton.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    function getValueCode() {
        const summernote = $('#summernote').summernote();
        const language = document.getElementById('language');
        const textarea = document.getElementById('inputCode');
        let lang = language.value;
        let value = textarea.value;
        // console.log(value);
        summernote.summernote('pasteHTML', `
        <div class="editor-highlight">
        <div class="bg-[#2a2c3d] w-full p-4 flex gap-2">
            <div class="h-[14px] w-[14px] rounded-full bg-orange-500"></div>
            <div class="h-[14px] w-[14px] rounded-full bg-yellow-300"></div>
            <div class="h-[14px] w-[14px] rounded-full bg-green-500"></div>
        </div>
        <pre><code class="language-${lang}">${value}
</code></pre>
        </div>`);
        modal.classList.add('hidden');
    }

</script>
<script>
const summernote = $('#summernote');
$(document).ready(function() {
    summernote.summernote({
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
          ['custom', ['textHighligt']],
        ],
        height: 400,
        callbacks: {
          onChange: function(contents, $editable) {
              @this.set('content', contents);
          },
        },
        buttons: {
            textHighligt: function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa fa-text-width"/>',
                    tooltip: 'Text Highligt',
                    click: function() {
                        summernote.summernote('pasteHTML', `
<div class="editor-highlight">
<div class="bg-[#2a2c3d] w-full p-4 flex gap-2">
    <div class="h-[14px] w-[14px] rounded-full bg-orange-500"></div>
    <div class="h-[14px] w-[14px] rounded-full bg-yellow-300"></div>
    <div class="h-[14px] w-[14px] rounded-full bg-green-500"></div>
</div>
<pre><code class="language-php">
</code></pre>
</div>`);
                        // modal.classList.remove('hidden');
                    // var el = document.createElement('pre');
                    // var code = document.createElement('code');
                    // el.appendChild(code);

                    // // set attributes
                    // el.setAttribute('class', 'editor-highlight');
                    // code.setAttribute('class', 'language-javascript');
                    // code.innerHTML = 'My Content';

                    // // insert element
                    // var range = context.invoke('editor.createRange');
                    // range.insertNode(el);
                    }
                });
                return button.render();
            }
        }
    });
});
</script>