<x-app-layout>
    

    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>                
                <li class="breadcrumb-item active"><a href="{{ route('post.index') }}">{{ __('Resource') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Post') }}</li> 
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
                        <h4>Add new Post</h4>
                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject">
                      <label for="floatingInput">Subject</label>
                      @error('subject')
                      <small>{{ $message }}</small>
                        
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Post" name="post" style="height: 100px;"></textarea>
                      <label for="floatingTextarea">Post</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="status">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Post status</label>
                    </div class="w-100 mt-5">
                        <button type="submit" class="btn btn-primary w-100">save post</button>
                    <div>

                    </div>
                  </div>
                        </form>            
                    </div>
                </div>
            </div>
        </div>
    </section>    
</x-app-layout>