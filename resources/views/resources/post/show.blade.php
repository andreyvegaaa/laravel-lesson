<x-app-layout>
    

    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>                
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{ __('Post') }}</a></li> 
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
                        <h4>Subject: {{ $post->subject}}</h4> 
                        <p><small class="text-lead">Status: {{ $post->status }}</small></p>
                        <p>{{ $post->post }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</x-app-layout>