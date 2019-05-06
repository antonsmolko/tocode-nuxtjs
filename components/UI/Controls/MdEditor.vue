<template>
    <div class="control md-editor">
        <div class="control-container-radio">
            <div class="radio">
                <input id="html" type="radio" name="editor" value="html" v-model="changeEditor">
                <label for="html">HTML</label>
            </div>
            <div class="radio">
                <input id="md" type="radio" name="editor" value="md" v-model="changeEditor">
                <label for="md">MD</label>
            </div>
        </div>
        <label><slot /></label>
        <div class="control-container">
            <textarea
                v-if="changeEditor === 'md'"
                class="md-input"
                data-input="md"
                :value="mdValue"
                @input="onMDInput"
            ></textarea>
            <div class="cm-container" v-else>
                <no-ssr placeholder="Codemirror Loading...">
                    <codemirror data-input="html"
                                :value="htmlValue"
                                :options="cmOption"
                                @input="onCMInput">
                    </codemirror>
                </no-ssr>
            </div>
            <div class="markdown-container">
                <div class="markdown-body" v-html="renderValue"></div>
            </div>
        </div>
        <div class="code-container">
        </div>
    </div>
</template>

<script>
import TurndownService from 'turndown';
const turndownService = new TurndownService({
    headingStyle: 'atx'
});

export default {
    data () {
        return {
            renderValue: '',
            htmlValue: '',
            mdValue: '',
            changeEditor: 'html',

            cmOption: {
                tabSize: 4,
                foldGutter: true,
                styleActiveLine: true,
                lineNumbers: true,
                line: true,
                keyMap: "sublime",
                mode: 'text/html',
                theme: 'idea',
                extraKeys: {
                    'F11'(cm) {
                    cm.setOption("fullScreen", !cm.getOption("fullScreen"))
                    },
                    'Esc'(cm) {
                    if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false)
                    }
                }
            }
        }
    },
    props: {
        value: {
            type: String,
            default: ''
        }
    },
    created () {
        this.renderValue = this.value;
        this.htmlValue = this.value;
        this.mdValue = turndownService.turndown(this.value);
    },
    computed: {
        inputMdValue () {
            return this.htmlValue;
        },
        inputHtmlValue () {
            return this.mdValue;
        }
    },
    methods: {
        onMDInput (e) {
            let value = e.target.value;
            this.renderValue = this.$md.render(value);
            this.htmlValue = this.$md.render(value);
            this.mdValue = value;
            this.$emit('input', this.renderValue);
        },
        onCMInput (value) {
            this.renderValue = value;
            this.htmlValue = value;
            this.mdValue = turndownService.turndown(value);;
            this.$emit('input', this.renderValue);
        }
    }
}
</script>

<style lang="scss">
.md-editor {
    position: relative;
    width: 100%;
    min-width: 100%;
    min-height: 500px;
    height: 500px;
    margin-top: 40px;
    .control-container {
        display: flex;
        & > .cm-container, textarea , .markdown-container {
            width: 50%;
            flex-grow: 1;
            height: 450px;
            border: 1px solid #DCDFE6;
        }
        & > .cm-container, textarea {
            border-radius: 20px 0 0 20px;
            margin-right: -.5px;
        }
        & > .cm-container {
            background-color: #f7f7f7;
            overflow: hidden;
            padding: 26px 0;
        }
        & > .markdown-container {
            border-radius: 0 20px 20px 0;
            padding: 20px 26px;
            margin-left: -.5px;
            background-color: #FAFAFA;
            overflow: scroll;
            &.md-input {
                line-height: 1.5;
            }
        }
    }
}
.control-container-radio {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
}
.radio {
    display: flex;
    align-items: center;
    &:not(:last-child) {
        margin-right: 20px;
    }
    label {
        text-align: left;
        line-height: 1;
        margin: 0;
        cursor: pointer;
    }
    input[type=radio] {
        width: auto;
        padding: 0;
        margin: 0;
        line-height: 1;
        margin-right: 10px;
    }
}
</style>
