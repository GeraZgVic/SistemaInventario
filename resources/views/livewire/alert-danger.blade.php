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
                <svg class="w-[18px] h-[18px] mr-1.5 -ml-1 text-red-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
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