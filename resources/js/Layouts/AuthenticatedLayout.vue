<template>
    <div>
        <header class="bg-gray-800 text-white p-4">
            <h1 class="text-xl">Welcome to Dashboard</h1>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
        <footer class="bg-gray-800 text-white p-4 text-center">
            <p>&copy; 2024 My App</p>
        </footer>
    </div>
</template>

<script>
    export default {
        name: 'AuthenticatedLayout',
    };

</script>

<style scoped>
    header,
    footer {
        text-align: center;
    }

</style>
