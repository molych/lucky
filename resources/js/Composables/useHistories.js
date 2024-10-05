import * as response from 'autoprefixer';
import axios from 'axios';
import { ref } from 'vue';

export function useHistories (state) {
    const loading = ref(false);
    const error = ref(null);

    const fetchHistories = async (uri, params ={}, histories) => {
        try {
            const response = await axios.get(uri, {params});
            state.histories = response.data.histories;
            return response.data.histories;
        } catch (err) {
            error.value = err.message || 'Error';
        } finally {
            loading.value = false;
        }
    };

    return {
        loading,
        error,
        fetchHistories
    };
}
