<x-layout>
<x-card class="p-3 md:p-10 max-w-lg mx-auto mt-5 md:mt-10">
    <a href="/" class="form-link flex items-center w-fit">
        <img src="{{asset('images/back.svg')}}" alt="back" class="mr-1 w-5"> Back 
    </a>

    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Post a Job</h2>
        <p class="mb-4">Post a job to find a developer</p>
    </header>

    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="company" class="inline-block text-lg mb-2">Company Name</label>
            <input type="text" class="form-input" name="company" value="{{old('company')}}" />

            @error('company')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Job Title</label>
            <input type="text" class="form-input" name="title" value="{{old('title')}}" placeholder="Example: Senior Laravel Developer" />

            @error('title')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="location" class="inline-block text-lg mb-2">Job Location</label>
            <input type="text" class="form-input" name="location" value="{{old('location')}}" placeholder="Example: Remote, Boston MA, etc" />

            @error('location')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
            <input type="text" class="form-input" name="email" value="{{old('email')}}" />

            @error('email')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="website" class="inline-block text-lg mb-2">
                Website/Application URL
            </label>
            <input type="text" class="form-input" name="website" value="{{old('website')}}" />

            @error('website')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input type="text" class="form-input" name="tags" value="{{old('tags')}}" placeholder="Example: Laravel, Backend, Postgres, etc" />

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
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Job Description
            </label>
            <textarea class="form-input" name="description" value="" rows="10" placeholder="Include tasks, requirements, salary, etc">{{old('description')}}</textarea>

            @error('description')
                <p class="text-primary text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="form-btn">Post Job</button>
        </div>
    </form>
</x-card>
</x-layout>
