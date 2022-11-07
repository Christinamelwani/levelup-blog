<script>
import Form from '@/components/general/Form.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import Multiselect from '@vueform/multiselect'
import myUpload from 'vue-image-crop-upload'
import dataUrlToFile from '@/helpers/dataUrlToFile'

export default {
  components: { Input, Btn, Form, Multiselect, myUpload },
  data() {
    return {
      showImageUpload: false,
      uploadedImage: ''
    }
  },
  computed: {
    ready() {
      if (!this.prefilled) {
        return true
      }
      if (this.articleData.title) {
        return true
      }
      return false
    },
    imagePreview() {
      return (
        this.uploadedImage ||
        this.articleData.image_path ||
        'https://fujifilm-x.com/wp-content/uploads/2019/08/xc16-50mmf35-56-ois-2_sample-images03.jpg'
      )
    }
  },
  methods: {
    async cropSuccess(imgDataUrl, field) {
      this.uploadedImage = imgDataUrl
      this.articleData.image = dataUrlToFile(imgDataUrl, field)
    }
  },
  props: {
    submitAction: {
      type: Function,
      required: true
    },
    submitText: {
      type: String,
      required: true
    },
    articleData: {
      type: Object,
      required: true
    },
    categoryOptions: {
      type: Array,
      required: true
    },
    prefilled: {
      type: Boolean,
      required: true,
      default: false
    }
  }
}
</script>

<template>
  <Form v-slot="slotProps" :submitAction="submitAction" :data="articleData">
    <div class="coverImage--box">
      <img
        @click="showImageUpload = !showImageUpload"
        class="coverImage"
        :src="imagePreview"
        alt=""
      />
      <my-upload
        field="image"
        @crop-success="cropSuccess"
        v-model="showImageUpload"
        class="coverImage__upload"
        img-format="png"
        langType="en"
      />
    </div>
    <div class="multicolumn__wrapper">
      <div class="form__column">
        <Input
          v-model="articleData.title"
          name="title"
          label="Title"
          type="text"
          placeholder="Set title"
          :required="false"
        />
        <Input
          v-model="articleData.content"
          :richTextSupport="true"
          :prefilled="prefilled"
          name="content"
          label="Content"
          type="text"
          placeholder="Add content"
          :required="false"
        />
      </div>
      <div class="form__column input__selector__column">
        <h2 class="inputLabel">Tags</h2>
        <Multiselect
          v-if="ready"
          v-model="articleData.categories"
          valueProp="id"
          mode="tags"
          label="name"
          :options="categoryOptions"
        />
      </div>
    </div>
    <Btn type="submit" :isLoading="slotProps.isLoading">{{ submitText }}</Btn>
  </Form>
</template>

<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.multiselect {
  background-color: #e5e5e5;
  width: 200px;
  flex-direction: column;
  height: fit-content;
  border: none;
}
.multiselect.is-open {
  border: none;
}
.multiselect-tags {
  display: flex;
  flex-direction: column;
  width: 95%;
}
.multiselect-tag {
  border-radius: 5px;
  border: 1px solid #e8e8e8;
  background: #fff;
  font-size: 12px;
  border-radius: 5px;
  font-weight: 700;
  display: flex;
  align-items: center;
  color: #6c757d;
  text-transform: uppercase;
}

.multiselect-clear {
  align-self: flex-end;
}
.multiselect-caret {
  align-self: flex-end;
}
</style>
