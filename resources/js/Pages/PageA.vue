<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import {reactive, defineProps, ref} from 'vue';
import axios from 'axios';

import { useHistories } from '@/Composables/useHistories.js';

const props = defineProps({
    random_number: Number,
    result: String,
    win_amount: Number,
    histories: Array

});

const state = reactive({
    randomNumber: props.random_number ,
    result: props.result,
    winAmount: props.win_amount,
    resultVisible: false,
    histories: props.histories
});

const { loading, error, fetchHistories } = useHistories(state);

const fetchHistory = param => {
    return fetchHistories('/histories', param);
};

const generateLink = async () => {
    await axios.post('/activate-link');
    window.location.reload();
}

const deactivateLink = async () => {
    await axios.post('/deactivate-link');
    window.location.reload();
}

const generateLuckyNumber = async () => {
    try {
        const response = await axios.post('/page-a/im-feeling-lucky', {
            'show-history': !!state.histories.length
        });
        if (response && response.data) {
            const history = response.data.history;
            state.randomNumber = history.random_number;
            state.result = history.result;
            state.winAmount = history.win_amount;
            state.histories = response.data.histories;
        } else {
            console.log(response);
        }
    } catch (error) {
        console.error('Error:', error);
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Page A</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 space-y-4">
                        <button @click="generateLink"
                                class="px-4 py-2 bg-yellow-500 text-white font-semibold
                         rounded-lg shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 transition"
                        >
                            Generate link
                        </button>
                        <div class="w-100 text-center"/>
                        <button @click="deactivateLink"
                                class="px-4 py-2 bg-red-500 text-white font-semibold
                         rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition"
                        >
                            Deactivate link
                        </button>
                        <div class="w-100 text-center"/>
                        <button @click="generateLuckyNumber"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold
                         rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition"
                        >
                            I'm Feeling Lucky
                        </button>
                        <div class="w-100 text-center"/>
                        <div v-if="state.randomNumber"
                             class="mt-6 p-4 bg-white shadow-sm rounded-lg border border-gray-200"
                        >
                            <div class="mb-4">
                                <p class="text-xl font-semibold">
                                    Random Number:
                                    <span :class="state.result ? 'text-green-600' : 'text-red-600'">
                                        {{ state.randomNumber }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="text-xl font-semibold">
                                    Result:
                                    <span :class="state.result ? 'text-green-600' : 'text-red-600'">
                                        {{ state.result === true ? 'Win' : 'Lose' }}
                                    </span>
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="text-xl font-semibold">
                                    Win Amount:
                                    <span :class="state.result ? 'text-green-600' : 'text-red-600'">
                                        {{ state.winAmount }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <Button  v-if="!state.histories?.length"
                                     @click="fetchHistory({'show-history' : true })"
                                     class="px-4 py-2 bg-green-500 text-white font-semibold
                                rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition"
                            >
                                Show History
                            </Button>
                            <Button v-if="state.histories?.length"
                                    @click="fetchHistory({})"
                                    type="button"
                                    class="px-4 py-2 bg-green-500 text-white font-semibold
                                rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition"
                            >
                                Hide History
                            </Button>
                            {{ console.log($page.props.histories?.length) }}
                            <div v-if="state.histories?.length || histories?.length"
                                 class="mt-6"
                            >
                                <ul class="space-y-4">
                                    <li v-for="history in state.histories"
                                        :key="history.id"
                                        class="p-4 bg-white shadow-sm rounded-lg border border-gray-200"
                                    >
                                        <div class="text-lg text-gray-500">
                                            Number: {{ history.random_number }}, Result:
                                            <span :class="history.result ? 'text-green-600' : 'text-red-600'">
                                                {{ history.result ? 'Win' : 'Lose' }}
                                            </span>, Win Amount: {{ history.win_amount }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div v-if="loading">Loading...</div>
                            <div v-if="error">{{ error }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
