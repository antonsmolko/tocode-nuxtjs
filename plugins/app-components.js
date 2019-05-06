import Vue from 'vue'

// Plugins

import VmMarkdown from '@/node_modules/vm-markdown'
import VueMarkdown from '@/node_modules/vue-markdown'
import TurndownService from '@/node_modules/turndown';

// UI
import Intro from '@/components/UI/Intro.vue'
import Message from '@/components/UI/Message.vue'

// Controls
import AppButton from '@/components/UI/Controls/AppButton.vue'
import AppInput from '@/components/UI/Controls/AppInput.vue'
import AppTextarea from '@/components/UI/Controls/AppTextarea.vue'
import MdEditor from '@/components/UI/Controls/MdEditor.vue'

// Plugins
Vue.component('VmMarkdown', VmMarkdown)
Vue.component('vue-markdown', VueMarkdown)
Vue.use(TurndownService)

// UI
Vue.component('Intro', Intro)
Vue.component('Message', Message)

// Controls
Vue.component('AppButton', AppButton)
Vue.component('AppInput', AppInput)
Vue.component('AppTextarea', AppTextarea)
Vue.component('MdEditor', MdEditor)