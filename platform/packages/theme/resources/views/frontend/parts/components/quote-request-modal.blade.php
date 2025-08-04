@props([
    'isOpen' => false,
    'productName' => null,
    'productSku' => null
])

<div x-data="{
    isOpen: @js($isOpen),
    isSubmitting: false,
    isSubmitted: false,
    formData: {
        fullName: '',
        phoneNumber: '',
        email: '',
        company: '',
        service: '',
        message: @js($productName ? 'I would like to request a quote for ' . $productName . ($productSku ? ' (SKU: ' . $productSku . ')' : '') : '')
    },
    services: [
        'ICT Equipment Sales',
        'Network Infrastructure',
        'CCTV Installation',
        'Server Installation',
        'Technical Support',
        'Software Development',
        'Cybersecurity Solutions',
        'General Inquiry'
    ],
    handleInputChange(field, value) {
        this.formData[field] = value;
    },
    async handleSubmit(e) {
        e.preventDefault();
        this.isSubmitting = true;

        try {
            // TODO: Replace with actual API call
            await axios.post('/api/quote-request', {
                name: this.formData.fullName,
                email: this.formData.email,
                phone: this.formData.phoneNumber,
                company: this.formData.company,
                subject: @js($productName) ? 'Quote Request - ' + @js($productName) : 'Quote Request',
                service: this.formData.service,
                message: this.formData.message
            });

            this.isSubmitted = true;

            setTimeout(() => {
                this.isSubmitted = false;
                this.formData = {
                    fullName: '',
                    phoneNumber: '',
                    email: '',
                    company: '',
                    service: '',
                    message: @js($productName) ? 'I would like to request a quote for ' + @js($productName) + (@js($productSku) ? ' (SKU: ' + @js($productSku) + ')' : '') : ''
                };
                this.isOpen = false;
            }, 2000);
        } catch (error) {
            console.error('Error submitting quote request:', error);
        } finally {
            this.isSubmitting = false;
        }
    },
    handleClose() {
        if (!this.isSubmitting) {
            this.isOpen = false;
            setTimeout(() => {
                this.isSubmitted = false;
                this.formData = {
                    fullName: '',
                    phoneNumber: '',
                    email: '',
                    company: '',
                    service: '',
                    message: @js($productName) ? 'I would like to request a quote for ' + @js($productName) + (@js($productSku) ? ' (SKU: ' + @js($productSku) + ')' : '') : ''
                };
            }, 300);
        }
    }
}" x-show="isOpen" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black/50" @click="handleClose"></div>

    <div class="relative bg-white rounded-lg max-w-md mx-auto my-8 p-6 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-jobarn-primary">Request Quote</h3>
            <button @click="handleClose" :disabled="isSubmitting" class="p-1">
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>
        </div>

        <template x-if="isSubmitted">
            <div class="text-center space-y-4 py-8">
                <i data-lucide="check-circle" class="h-16 w-16 text-green-500 mx-auto"></i>
                <h3 class="text-xl font-semibold text-green-800">Quote Request Sent!</h3>
                <p class="text-green-700">We'll get back to you within 24 hours with a detailed quote.</p>
            </div>
        </template>

        <template x-if="!isSubmitted">
            <form @submit="handleSubmit" class="space-y-4">
                <div class="space-y-2">
                    <label for="fullName" class="block">Full Name *</label>
                    <input
                        id="fullName"
                        x-model="formData.fullName"
                        @input="handleInputChange('fullName', $event.target.value)"
                        placeholder="Your full name"
                        required
                        class="w-full px-3 py-2 border rounded"
                    />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="phoneNumber" class="block">Phone Number *</label>
                        <input
                            id="phoneNumber"
                            x-model="formData.phoneNumber"
                            @input="handleInputChange('phoneNumber', $event.target.value)"
                            placeholder="+255 xxx xxx xxx"
                            required
                            class="w-full px-3 py-2 border rounded"
                        />
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="block">Email Address *</label>
                        <input
                            id="email"
                            type="email"
                            x-model="formData.email"
                            @input="handleInputChange('email', $event.target.value)"
                            placeholder="your.email@example.com"
                            required
                            class="w-full px-3 py-2 border rounded"
                        />
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="company" class="block">Company Name</label>
                    <input
                        id="company"
                        x-model="formData.company"
                        @input="handleInputChange('company', $event.target.value)"
                        placeholder="Your company name (optional)"
                        class="w-full px-3 py-2 border rounded"
                    />
                </div>

                <div class="space-y-2">
                    <label for="service" class="block">Service Category</label>
                    <select
                        x-model="formData.service"
                        @change="handleInputChange('service', $event.target.value)"
                        class="w-full px-3 py-2 border rounded"
                    >
                        <option value="">Select a service category</option>
                        <template x-for="service in services" :key="service">
                            <option x-text="service" :value="service"></option>
                        </template>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="message" class="block">Message *</label>
                    <textarea
                        id="message"
                        x-model="formData.message"
                        @input="handleInputChange('message', $event.target.value)"
                        placeholder="Please describe your requirements..."
                        rows="4"
                        required
                        class="w-full px-3 py-2 border rounded"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    :disabled="isSubmitting"
                    class="w-full bg-jobarn-primary hover:bg-jobarn-primary/90 text-white py-2 px-4 rounded flex items-center justify-center"
                >
                    <template x-if="isSubmitting">
                        Sending Request...
                    </template>
                    <template x-if="!isSubmitting">
                        <span class="flex items-center">
                            Send Quote Request
                            <i data-lucide="send" class="ml-2 h-4 w-4"></i>
                        </span>
                    </template>
                </button>
            </form>
        </template>
    </div>
</div>
