<x-layout>
    <x-card class="p-3 md:p-10 max-w-lg mx-auto mt-5 md:mt-10">
        <a href="/posts/{{encrypt($id)}}" class="form-link flex items-center w-fit">
            <img src="{{asset('images/back.svg')}}" alt="back" class="mr-1 w-5"> Back 
        </a>

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Job Post
            </h2>
            <p class="mb-4">{{$title}}</p>
        </header>
    
        <form  method="POST" action="/posts/{{encrypt($id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="form-input" name="company" value="{{$company}}" />
    
                @error('company')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input type="text" class="form-input" name="title" value="{{$title}}" placeholder="Example: Senior Laravel Developer" />
    
                @error('title')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input type="text" class="form-input" name="location" value="{{$location}}" placeholder="Example: Remote, Boston MA, etc" />
    
                @error('location')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="form-input" name="email" value="{{$email}}" />
    
                @error('email')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="form-input" name="website" value="{{$website}}" />
    
                @error('website')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="form-input" name="tags" value="{{$tags}}" placeholder="Example: Laravel, Backend, Postgres, etc" />
    
                @error('tags')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="form-input" name="logo" />

                @error('logo')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror

                <img class="w-48 mt-2 mr-6 mb-6" src="{{$logo ? asset("storage/$logo") : asset('images/post-default.png')}}" alt="acme" />
            </div>
    
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="form-input" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc">{{$description}}</textarea>
    
                @error('description')
                    <p class="text-primary text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6 ">
                <button class="form-btn">
                    Update Job Post
                </button>
            </div>
        </form>
    </x-card>
    </x-layout>
    