<style>
    @keyframes slideInRight {
        from {
            transform: translateY(-40%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    #notification-toast.show {
        animation: slideInRight 0.5s ease-out forwards;
    }
    
</style>

<div id="notification-toast" class="absolute w-full duration-300 ease-out select-none sm:max-w-xs right-0 top-6 sm:top-10 sm:mt-6 sm:mr-6 show">
    <span class="relative flex flex-col items-start shadow-[0_5px_15px_-3px_rgb(0_0_0_/_0.08)] w-full transition-all duration-300 ease-out bg-white border border-gray-100 sm:rounded-md sm:max-w-xs group p-4">
        <div class="relative">
            <div class="flex items-center">
                <svg class="w-[18px] h-[18px] mr-1.5 -ml-1 text-green-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM16.7744 9.63269C17.1238 9.20501 17.0604 8.57503 16.6327 8.22559C16.2051 7.87615 15.5751 7.93957 15.2256 8.36725L10.6321 13.9892L8.65936 12.2524C8.24484 11.8874 7.61295 11.9276 7.248 12.3421C6.88304 12.7566 6.92322 13.3885 7.33774 13.7535L9.31046 15.4903C10.1612 16.2393 11.4637 16.1324 12.1808 15.2547L16.7744 9.63269Z" fill="currentColor"></path>
                </svg>
                <p class="text-[13px] font-medium leading-none text-gray-600">Notificación</p>
            </div>
            <!-- Añadir descripción si es necesario -->
            <p class="text-xs font-medium leading-none text-gray-600 my-2 ml-5">{{$texto}}</p>
        </div>
    </span>
</div>

<script>
    setTimeout(() => {
        const notification = document.querySelector('#notification-toast');
        notification.remove();
    }, 3000);
</script>