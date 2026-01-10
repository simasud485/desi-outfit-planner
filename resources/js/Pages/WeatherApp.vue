<script setup>
import { ref } from 'vue';
import axios from 'axios';

const city = ref('');
const weatherData = ref(null);
const loading = ref(false);
const error = ref(null);

const fetchRecommendation = async () => {
    if (!city.value)
        return;

    loading.value = true;
    error.value = null;
    weatherData.value = null;

    try {
        //axios call to our internal Laravel API
        const response = await axios.get(`/recommend/${city.value}`);
        // Print just the data from Laravel
        console.log("Laravel Data:", response.data);
        weatherData.value = response.data.data;
    } catch (err) {
        console.log("Catch block triggered!"); // Debug log

        if (err.response && err.response.status === 404) {
            // Now 'error' refers correctly to your ref('')
            error.value = `We couldn't find "${city.value}". Try a real city like Dhaka.`;
        } else {
            error.value = "Check your internet or try again later.";
        }

        console.error("Full Error Object:", err);
    } finally {
        loading.value = false;
    }
};
</script>

<template>
    <div
        class="min-h-screen bg-linear-to-br from-slate-900 to-slate-800 text-white p-6 font-sans flex flex-col items-center pt-20">

        <div class="max-w-md w-full mx-auto flex flex-col">
            <h1 class="text-3xl font-bold text-center mb-8 text-sky-400">Desi Outfit Planner</h1>

            <div class="flex gap-2 mb-8">
                <input type="text" v-model="city" @keyup.enter="fetchRecommendation"
                    placeholder="Enter City (e.g. Dhaka)"
                    class="flex-1 p-3 rounded-lg bg-white/10 backdrop-blur-sm border border-slate-600 focus:outline-none focus:border-sky-500 shadow-inner">
                <button @click="fetchRecommendation" :disabled="loading"
                    class="bg-sky-600 hover:bg-sky-500 px-6 py-3 rounded-lg font-bold transition-all disabled:opacity-50">
                    {{ loading ? '...' : 'Plan' }}
                </button>
            </div>

            <div class="min-h-100">

                <div v-if="loading" class="bg-slate-700/30 rounded-2xl p-6 border border-white/5 animate-pulse h-100">
                    <div class="flex justify-between mb-6">
                        <div class="h-8 w-32 bg-slate-600 rounded"></div>
                        <div class="h-10 w-16 bg-slate-600 rounded"></div>
                    </div>
                    <div class="space-y-4">
                        <div class="h-20 bg-slate-600/50 rounded-xl"></div>
                        <div class="h-32 bg-slate-600/50 rounded-xl"></div>
                    </div>
                </div>

                <div v-else-if="error"
                    class="bg-red-500/10 border border-red-500 text-red-400 p-4 rounded-lg flex flex-col items-center text-center">
                    <span class="text-xl font-bold">Oops!</span>
                    <span class="text-sm opacity-90">{{ error }}</span>
                </div>

                <div v-else-if="weatherData"
                    class="bg-slate-700/50 backdrop-blur-md rounded-2xl p-6 border border-white/10 shadow-2xl flex flex-col gap-6 animate-fade-in min-h-[400px]">

                    <div v-if="weatherData.recommendation.image" class="relative h-48 w-full">
                        <img :src="weatherData.recommendation.image"
                            @error="(e) => e.target.src = 'https://placehold.co/600x400/1e293b/sky?text=No+Preview'"
                            class="w-full h-full object-cover" alt="Outfit Suggestion">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-900/80 to-transparent"></div>
                        <div class="absolute bottom-4 left-6">
                            <span
                                class="bg-sky-500 text-[10px] uppercase font-bold px-2 py-1 rounded-sm tracking-widest">
                                {{ weatherData.recommendation.style }}
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-b border-white/10 pb-4">
                        <span class="text-white text-2xl font-bold uppercase tracking-tight">{{ weatherData.location
                        }}</span>
                        <span class="text-slate-300 text-4xl font-light">{{ weatherData.temp }}°C</span>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col p-4 bg-white/5 rounded-xl border border-white/5">
                            <span class="text-xs text-slate-500 uppercase font-bold mb-1">Current
                                Condition</span>
                            <span class="text-lg font-medium text-sky-200">{{ weatherData.condition }}</span>
                        </div>

                        <div class="flex flex-col p-4 bg-emerald-500/10 rounded-xl border border-emerald-500/20">
                            <span class="text-xs text-emerald-400 uppercase font-bold mb-1">Recommended Outfit</span>
                            <div class="flex flex-col mb-2">
                                <span class="text-xl font-semibold text-emerald-100 italic">
                                    {{ weatherData.recommendation.outfit_name || weatherData.recommendation.name }}
                                </span>
                            </div>
                            <span class="text-sm text-emerald-300 border-t border-emerald-500/20 pt-2">
                                {{ weatherData.recommendation.advice }}
                            </span>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center text-slate-500 mt-10">
                    <div class="p-10 border-2 border-dashed border-slate-700 rounded-2xl italic">
                        Enter a city to see the magic!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>