<template>
    <div class="moreInformation">
        <span @click="isModalOpened = true" label="Open" class="btn-header read-more fs1 " aria-hidden="true">
            <span class="icon   icon-read-more"></span>
        </span>
        <CustomModal v-if="isModalOpened" @close="isModalOpened = false" :modalsize="'modal-xl'">
            <template v-slot:content>
                <div v-if="storeData?.data?.opening_hours" class="row worktimes mb_35 mt_35">
                    <div v-for="(type, indexType) in reverseItemsWorktimes" class="col-md-4 openning-times  ">
                        <div>
                            <h5 class=" title title-h5 mb_20"> <strong>{{
                                    $t(`components.pages.store.header.moreinfos.worktimes.deliverymode.${indexType}`)
                                    }} :
                                </strong>
                            </h5>
                            <div v-for="(work_time, indexWork) in type" class="mb_10">
                                <b class="days text-color">
                                    {{ $t(`opening.dayOfWeek.${work_time.dayOfWeek}`) }} </b>:
                                <span class="time text-color">
                                    {{
                                    work_time.libel == "closed"
                                    ? $t("opening.closed")
                                    : work_time.libel
                                    }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row worktimes mb_35 mt_35 text-center">
                    <h5 class="title title-h5   text-center"><strong>Jours fériés : <span class="time text-color">
                                18:00 -
                                23:00</span></strong>
                    </h5>

                </div>
            </template>
        </CustomModal>
    </div>
</template>


<script>
import { mapState, mapActions } from "vuex";

import dayjs from "dayjs";
export default {
    components: {
    },
    data() {
        return {
            isModalOpened: false,
            StoreOptions: null,
        }
    },
    mounted() {
    },
    created() {
    },
    methods: {
        getDayName(dayOfWeek) {
            return dayjs().day(dayOfWeek).format("dddd");
        },
    },
    computed: {
        ...mapState(['storeData']),
        reverseItemsWorktimes() {

            const reorderedKeys = ["at_place", "cac", "liv"];
            const reorderedObject = {};
            reorderedKeys.forEach(key => {
                if (this.storeData?.data?.opening_hours.hasOwnProperty(key)) {
                    reorderedObject[key] = this.storeData?.data?.opening_hours[key]?.lists;
                }
            });
            return reorderedObject;
        },
    },
};
</script>