<template>
  <div class="bg-gradient-to-bl from-indigo-900 via-white to-yellow-900 pt-6 overflow-hidden" style="height:100vh">
    
    <!-- Photographer Profile -->
    <div class="mx-auto bg-white rounded-lg" style="width:70%">
        <div class="flex flex-row">

            <!-- Profile Photo -->
            <div class="pl-12 py-8">
                <img :src="data.profile_picture" alt="" class="rounded-full w-80">
            </div>
            
            <!-- Photographer Info -->
            <div class="p-8 my-auto">
                <!-- Name -->
                <ul><li class="text-3xl font-bold text-left"> {{data.name}}</li></ul>

                <!-- Bio -->
                <ul class="text-left float-left" style="width:65%">
                    <li><Field>Bio</Field></li>
                    <li class="text-gray-400">{{data.bio}}</li>
                </ul>

                <!-- Contact Info -->
                <ul class="float-right text-left" style="width:30%">
                    <Field> Phone </Field>
                    <FieldContent> {{data.phone}} </FieldContent>
                    <Field> Email </Field>
                    <FieldContent> {{data.email}} </FieldContent>
                </ul>
            </div>
        </div>
    </div>

    <!-- Album -->
    <div class="mx-auto mt-6 flex flex-row flex-wrap justify-around overflow-y-scroll" style="width:69%; height:73%">
        <template v-for="image in data.album" :key="image.id">
            <ImageCard :imageData="image"/>
        </template>
    </div> 
  </div>
  
</template>

<script>
import Field from '../components/Field.vue';
import FieldContent from '../components/FieldContent.vue';
import ImageCard from '../components/ImageCard.vue';
export default {
    components: {
        Field,
        FieldContent,
        ImageCard,
    },
    data () {
        return {
            data: {
                name: '',
                phone: '',
                email: '',
                bio: '',
                picture: '',
                album: '',
            },
        }
    },

    methods: {
        async fetchData () {
            let url = "/landscapes.json";
            try {
                const response = await fetch(url)
                this.data = await response.json()
            } catch (error) {
                console.log(error)
            }
        }
    },
    
    created() {
        this.fetchData();
    }
}
</script>

<style>
  ::-webkit-scrollbar {
    width: 2px;
  }
  /* Track */
  ::-webkit-scrollbar-track {
    background: var(--darkestgray); 
    
    border-radius: 1px;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #333;
    
    border-radius: 1px;
  }
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: none; 
  }
</style> 