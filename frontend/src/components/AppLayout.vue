<template>
  <div class="min-h-full flex grow flex-col gap-10">
    <div
      ref="header"
      class="p-0 m-0 w-full basis-auto z-20"
    >
      <slot name="header" />
    </div>
    <main
      class="grow"
    >
      <slot name="main" />
    </main>
    <div
      ref="footer"
      class="p-0 m-0 w-full basis-auto"
    >
      <slot name="footer" />
    </div>
  </div>
</template>