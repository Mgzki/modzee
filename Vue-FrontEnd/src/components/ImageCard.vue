<template>
  <div class="bg-white rounded-lg shadow-xl mb-6 relative" style="width:32%">
        <div class="flex justify-center overflow-hidden">
            <img :src="imageData.img" alt="" class="rounded-t-lg flex-1 h-48">
        </div>
        
        <p class="absolute mt-40 top-0 pl-3 pb-3 text-white text-xl font-bold">{{imageData.title}}</p>
    
    <p class="px-4 text-center">{{imageData.description}}</p>
    <div>
        <div v-if="imageData.featured">
            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 0 24 24" width="48px" fill="#FF0000" class="float-left pl-6 pb-4">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        </div>
        
        <p class="float-right pr-4 mt-1 text-gray-400">{{imageData.date}}</p>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        imageData: Object
    },
}
</script>