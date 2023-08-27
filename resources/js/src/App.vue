<template>
    <div class="fabric">
        <button @click="addBox">사각형</button>
        <button @click="addCircle">동그라미</button>
        <button @click="saveObjects">저장</button>
        <canvas ref="canvasRef" width="400" height="400"></canvas>

    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import { fabric } from 'fabric';
export default {
    setup() {
        const canvasRef = ref(null);
        let canvas = null;
        const drawingMode = ref(false);
        const objects = ref([]);

        const addCircle = () => {
            const circle = new fabric.Ellipse({
                rx: 40,
                ry: 40,
                stroke: 'green',
                fill: '',
                top: 300,
                left: 300,
            });
            canvas.add(circle);
            canvas.setActiveObject(circle);
            objects.value.push(circle); // 배열에 객체 추가
        };

        const addBox = () => {
            const rect = new fabric.Rect({
                top: 100,
                left: 100,
                width: 50,
                height: 50,
                stroke: 'red',
                fill: '',
            });
            canvas.add(rect);
            canvas.setActiveObject(rect);
            objects.value.push(rect); // 배열에 객체 추가
        };

        const saveObjects = () => {
            // 객체 배열을 JSON 문자열로 변환하여 저장할 수 있습니다.
            const objectsJSON = JSON.stringify(objects.value);
            // 이제 objectsJSON을 저장하거나 다른 곳에 전송할 수 있습니다.
            console.log(objectsJSON); // 콘솔에 출력 예시
        };

        onMounted(() => {
            // Canvas 요소 가져오기
            canvas = new fabric.Canvas(canvasRef.value);
            //캔버스 상의 객체의 크기를 조절
            canvas.on('object:scaling', () => {
                //현재 활성화된(선택된) 객체를 가져옴
                const obj = canvas.getActiveObject();

                if (obj instanceof fabric.Ellipse) {
                    // 만약 객체가 Circle인 경우
                    const rx = obj.rx; // 가로 반지름
                    const ry = obj.ry; // 세로 반지름
                    const scaleX = obj.scaleX;
                    const scaleY = obj.scaleY;
                    obj.set({
                        rx: rx * scaleX, // 가로 반지름 조절
                        ry: ry * scaleY, // 세로 반지름 조절
                        scaleX: 1,
                        scaleY: 1,
                    });
                } else {
                    const width = obj.width;
                    const height = obj.height;
                    const scaleX = obj.scaleX;
                    const scaleY = obj.scaleY;
                    obj.set({
                        width: width * scaleX,
                        height: height * scaleY,
                        scaleX: 1,
                        scaleY: 1,
                    });
                }
                canvas.requestRenderAll(); // 화면 업데이트 요청
            });
        });

        return {
            canvasRef,
            addCircle,
            addBox,
            drawingMode,
            saveObjects,

        };
    }
};

</script>
<style>
.fabric {
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
}

canvas {
    border: 1px solid #000
}
</style>