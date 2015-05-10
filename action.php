<html>
    <head>
        <title>HLT Higgs Validation</title>
    </head>
    <body>
        <?php
            $release = htmlspecialchars($_POST['release']);
            $refRelease = htmlspecialchars($_POST['refRelease']);
        ?>
        Release: <?php echo htmlspecialchars($_POST['release']);?>
        <p> <br> </p>
        Reference Release: <?php echo htmlspecialchars($_POST['refRelease']); ?> 
        <p> <br> </p>
        
        <?php
            $dir = array("Hgg","HggControlPaths","HWW","HZZ","H2tau","DoubleHinTaus","HiggsDalitz","Htaunu","TTHbbej","AHttH","VBFHbb_0btag","VBFHbb_1btag","VBFHbb_2btag","X4b","ZnnHbb","PhotonJet");
//             var_dump($dir);
            $TTbarSample = htmlspecialchars($_POST['TTbarSample']);
        ?>
        <br> <br> <!-- newline (x2) -->
        <?php 

            $relval = array(
                               "IsoMu20" => array("ZMM_13","TTbarLepton_13","SingleMuPt100_UP15","SingleMuPt1000_UP15"),
                               "IsoTkMu20" => array("ZMM_13","TTbarLepton_13","SingleMuPt100_UP15","SingleMuPt1000_UP15")
                            );

//             var_dump($relval);
            
          //  $release = "CMSSW_7_4_1-MCRUN2_74_V9_gensim_740pre7-v1";
          //  $refRelease = "CMSSW_7_4_0-MCRUN2_74_V7-v1";

            
            $links = array();
            $effLinks = array();
            $flatNames = array();
            
            foreach($relval as $process  => $array) {
                foreach($array as $sample) {
                    #            $links[] = "https://cmsweb.cern.ch/dqm/relval/start?runnr=1;dataset=/RelVal${sample}_13/${release}/DQMIO;sampletype=offline_relval;filter=all;referencepos=overlay;referenceshow=all;referenceobj1=other%3A%3A/RelVal${sample}_13/${refRelease}/DQMIO%3A0.9;referenceobj2=none;referenceobj3=none;referenceobj4=none;search=;striptype=object;stripruns=;stripaxis=run;stripomit=none;workspace=HLT;size=M;root=HLT/Higgs/${process};focus=;zoom=no;";
                    #$links[] = "https://cmsweb.cern.ch/dqm/relval/start?runnr=1;dataset=/RelVal${sample}_13/${release}/DQMIO;sampletype=offline_relval;filter=all;referencepos=overlay;referenceshow=all;referenceobj1=other%3A%3A/RelVal${sample}_13/${refRelease}/DQMIO%3A0.9;referenceobj2=none;referenceobj3=none;referenceobj4=none;search=;striptype=object;stripruns=;stripaxis=run;stripomit=none;workspace=HLT;size=M;root=HLT/Muon/Distributions/${process};focus=;zoom=no;";
                    $links[] = "https://cmsweb.cern.ch/dqm/relval/start?runnr=1;dataset=/RelVal${sample}/${release}/DQMIO;sampletype=offline_relval;filter=all;referencepos=overlay;referenceshow=all;referenceobj1=other%3A%3A/RelVal${sample}/${refRelease}/DQMIO%3A0.9;referenceobj2=none;referenceobj3=none;referenceobj4=none;search=;striptype=object;stripruns=;stripaxis=run;stripomit=none;workspace=HLT;size=M;root=HLT/Muon/Distributions/HLT_${process};focus=;zoom=no;";

                    $effLinks[] =
                    "https://cmsweb.cern.ch/dqm/relval/plotfairy/overlay?session=I5Me1f;v=1421478412567846000;obj=archive%2F1%2FRelVal${sample}_13%2F${release}%2FDQMIO%2FHLT%2FHiggs%2F${process}%2FEffSummaryPaths_${process}_rec;obj=archive%2F1%2FRelVal${sample}_13%2F${refRelease}%2FDQMIO%2FHLT%2FHiggs%2F${process}%2FEffSummaryPaths_${process}_rec;ktest=0.9;w=600;h=350";
                    $flatNames[] = "$process - $sample";
                }
            }
//             foreach($effLinks as $link) {
//                 echo $link ;
//                 echo "<br> <br>";
//             }
//             echo "<br> <br>";

        ?>
        <table border="1" style="width:100%">
            <?php foreach($flatNames as $key=>$flatName):  // <!-- alternate syntax for more readable html code -->
                if ($key % 4 == 0 ) echo "<tr>"; ?>
                <td>
                    <a target="_blank" href="<?php echo $links[$key];?>">
                    <?php echo $flatName;?>
                    </a>
                </td>
            <?php if ($key % 4 == 3 || ($key + 1) == count($flatNames) ) echo "</tr>"; ?>
            <?php endforeach; ?>
            
            
        </table>
        <hr></hr>
    </body>
</html>