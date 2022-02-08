import highway from "@dogstudio/highway";
import { TimelineLite } from "gsap/gsap-core";

class Fade extends highway.Transition {
    in({ from, to, done }) {
        const tln = new TimelineLite();
        tln.fromTo(to, 0.5, { left: '-100%', top: '50%' }, { left: '0%' })
            .fromTo(to, 0.5, { height: '2vh' }, {
                height: '100vh', top: "10%", onComplete() {
                    done();
                }
            });
    }
    out({ from, done }) {
        done();
    }
}
export default Fade;