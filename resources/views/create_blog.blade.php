@if (Auth::user())

<x-guest-layout>
  
       
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="blog_form">
                    @csrf
                    <div class="mb-4">
                            <label class="text-xl text-gray-600">Blog Name <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="name" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="description" id="description" placeholder="(Optional)">
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                            <textarea name="content" class="border-2 border-gray-500">
                                
                            </textarea>
                        </div>

                        <div class="flex p-1 mt-2">
                            <x-jet-button role="submit" type="submit" class="ml-4" required>Add Blog</x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <p>Blog Posts</p>
                </div>

                @foreach ($posts as $post)
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
    
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                           # {{$post['id']}}   
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">{{$post['title']}}</div>
                            </div><br/><br/>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                {!! $post['blog_content'] !!}     
                            </div>
                            <br/><br/>
                            <div class="mt-2"> Created: User{{ $post['user_id'] }} - {{ $post['created_at'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'content' );
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        //page onload
        $(document).ready(function() {
            postBlog();
            $('#posts').show();
        });
        function postBlog() {
            //submit form
            $('#blog_form').submit(function() {
                var form_values = $('#blog_form').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'add_blog',
                    data: form_values,
                 success: function(data) {
                    setTimeout(
                        function() 
                        {
                            location.reload();
                        }, 0001);   
                    }
                });
                $('#email_message').show();
                return false;
            });
        }
    </script>
</x-guest-layout>
@endif