<template>
    <div v-if="storeData?.data?.opening_hours" v-for="(type, indexType) in fakeTimes" class="w-100 h-100   "
        :class="getClassForArrayLength()">

        <h5 class="mb_20 text-center title title-h5">
            <strong>{{
                $t(`components.pages.store.header.moreinfos.worktimes.deliverymode.${indexType}`)
                }}</strong>
        </h5>
        <div class="time_list">

            <div class="time_item" v-for="(work_time, indexWork) in type">
                <strong class="text-color days"> {{ $t(`opening.dayOfWeek.${work_time.dayOfWeek}`) }} : </strong>
                <span class="text-color" :class="[work_time.libel == 'closed' ? 'closed' : '']">
                    {{
                    work_time.libel == "closed"
                    ? $t("opening.closed")
                    : work_time.libel
                    }}
                </span>
            </div>
            <div class="time_item">
                <strong class="text-color days">Jours fériés : </strong>
                <span class="text-color  " >
                    18:00 - 23:00
                </span>
            </div>
        </div>
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
            commonLists: [],
            fakeTimes: {}
        }
    },
    mounted() {

        this.findCommonLists();
        if (this.commonLists.length >= 2) {
            this.fakeTimes['at_place'] = this.storeData?.data?.opening_hours['cac']?.lists
        } else {
            if (this.commonLists[0]?.cac && this.commonLists[0]?.liv) {
                this.fakeTimes['at_place'] = this.storeData?.data?.opening_hours['at_place']?.lists
                this.fakeTimes['cac_liv'] = this.commonLists[0].liv
            } else if (this.commonLists[0]?.at_place && this.commonLists[0]?.liv) {
                this.fakeTimes['cac'] = this.storeData?.data?.opening_hours['cac']?.lists
                this.fakeTimes['at_place_liv'] = this.commonLists[0].liv
            } else if (this.commonLists[0]?.at_place && this.commonLists[0]?.cac) {
                this.fakeTimes['liv'] = this.storeData?.data?.opening_hours['liv']?.lists
                this.fakeTimes['at_place_cac'] = this.commonLists[0].cac
            }
        }
    },
    created() {
    },
    methods: {
        getDayName(dayOfWeek) {
            return dayjs().day(dayOfWeek).format("dddd");
        },

        findCommonLists() {
            const keys = Object.keys(this.storeData?.data?.opening_hours);
            for (let i = 0; i < keys.length - 1; i++) {
                const key1 = keys[i];
                for (let j = i + 1; j < keys.length; j++) {
                    const key2 = keys[j];
                    if (this.areListsEqual(this.storeData?.data?.opening_hours[key1].lists, this.storeData?.data?.opening_hours[key2].lists)) {
                        this.commonLists.push({
                            [key1]: this.storeData?.data?.opening_hours[key1].lists,
                            [key2]: this.storeData?.data?.opening_hours[key2].lists,
                        });
                    }
                }
            }
        },
        areListsEqual(list1, list2) {
            if (list1.length !== list2.length) {
                return false;
            }
            for (let i = 0; i < list1.length; i++) {
                if (JSON.stringify(list1[i]) !== JSON.stringify(list2[i])) {
                    return false;
                }
            }
            return true;
        },
        getClassForArrayLength() {
            const length = Object.keys(this.fakeTimes)?.length;
            if (length === 2) {
                return 'col-md-6';
            } else if (length === 1) {
                return 'col-md-6';
            } else if (length === 3) {
                return 'col-md-4';
            } else {
                return 'col-md-12';
            }
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