<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Custom URL</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="input-group" v-if="message">
                <p id="customurl" target="_blank" rel="noopener noreferrer">{{ formattedUrl }}</p>
                <!-- <label id="customurl" class="input-label">{{ formattedUrl }}</label> -->
                <button class="btn" data-clipboard-target="#customurl">
                    <i class="fas fa-clipboard-list"></i>
                </button>
            </div>
            <input v-model="message" class="form-control" placeholder="Enter URL">
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    props: {
        dashboardUrl: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            message: ''
        };
    },
    computed: {
        formattedUrl() {
            // Construct the URL based on the message
            return this.message ? `${this.message}.com@${this.formattedDashboardUrl}` : '';
        },
        formattedDashboardUrl() {
            // Remove "http://" or "https://" from the URL
            return this.dashboardUrl.replace(/^https?:\/\//, '');
        }
    }
};
</script>

<style>
.input-group {
    display: flex;
    align-items: center; /* Align items vertically centered */
}

.input-label {
    margin-right: 10px; /* Add some space between the label and the button */
}
</style>
