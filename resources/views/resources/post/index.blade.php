<x-app-layout>
    

    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>                
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
           
                @if(session()->has('message'))      
                    <div id="success-alert" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}                        
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        // Automatically close the alert after 5 seconds
                        setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            alert.parentNode.removeChild(alert);
                        }, 5000);
                    </script>
                @endif


                <div class="card p-5">
                    <div class="card-body">                         
                        <div class="text-end">
                            <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill me-1"></i> Add a New Post</a>
                        </div>                           
                        <hr class="my-5">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>                                    
                                    <th scope="col">Options</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{$post->subject}}</td>
                                        <td>{{$post->post}}</td>
                                        <td>{{($post->status == 1 ? 'Published' : 'Unpublished')}}</td>
                                        <td>
                                            <a href="{{ route('post.show', $post) }}" class="btn btn-info m-1"><i
                                                    class="bi bi-folder-symlink"></i></a>
                                            <a href="{{ route('post.edit', $post) }}" class="btn btn-success m-1"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered"><i class="bi bi-trash"></i></button>

                                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Post</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this post?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <form action="{{ route('post.destroy', $post) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach                            
                                @endisset                              
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </section>    
</x-app-layout>