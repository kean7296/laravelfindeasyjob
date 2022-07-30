<div class="md:flex justify-between items-center py-4 w-full">
    <form action="" class="md:w-1/2 max-w-md">
        <div class="flex search-container border border-primary rounded-md pl-4 w-full">
            <input type="search" name="search" class="outline-none border-none text-xl py-2 flex-1 placeholder:text-text-light text-primary-darker" placeholder="search job posted" value="{{request()->input('search')}}">
            <button type="submit" class="bg-primary flex items-center justify-center px-3 hover:bg-primary-darker hover:text-white transition-all">
                <img src="{{asset('images/search-icon.svg')}}" alt="search">
            </button>
        </div>
    </form>
    @auth
        <a href="/posts/create" class="hidden md:flex form-btn">
            <img src="{{asset('images/post-a-job-icon.svg')}}" class="mr-2" alt="post a job"> Post a Job
        </a>
    @endauth
</div>
