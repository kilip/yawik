<template>
  <div class="bg-gray-100 min-h-screen">
    <h1>test</h1>
  </div>
</template>

<script>
export default {
  middleware({store, redirect}){
    return redirect('/jobs');
  }
}
</script>
